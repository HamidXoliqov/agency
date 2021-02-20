<?php

namespace app\modules\subsidy\controllers;

use app\modules\admin\models\Users;
use app\modules\manuals\models\AppealStatus;
use app\modules\subsidy\models\Appeal;
use app\modules\subsidy\models\StatusTimeline;
use Yii;
use app\modules\subsidy\models\SubsidyProtocol;
use app\modules\subsidy\models\SubsidyProtocolSearch;
use app\controllers\BaseController;
use app\modules\subsidy\models\CommissionMembers;
use GuzzleHttp\Client;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * SubsidyProtocolController implements the CRUD actions for SubsidyProtocol model.
 */
class SubsidyProtocolController extends BaseController
{
/*
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
*/

    /**
     * Lists all SubsidyProtocol models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SubsidyProtocolSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SubsidyProtocol model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SubsidyProtocol model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        /* @var $user Users*/
        $user = Yii::$app->user->identity;
        if(!$user->isAgency()) {
            return $this->redirect(["index"]);
        }
        $errorMsg = "";
        $model = new SubsidyProtocol();
//        $model->status = SubsidyProtocol::PROTOCOL_STATUS_NEW;
        $model->status = SubsidyProtocol::PROTOCOL_STATUS_EDIT;
        $model->loadDefaultsData();
//        if($model->save()) {
//            return $this->redirect(['update', 'id' => $model->id]);
//        }
//        return $this->redirect(['index']);

//        if ($model->load(Yii::$app->request->post())) {
//            $file = UploadedFile::getInstance($model, "protocol_file");
//            if($file != null) {
//                $folder = 'uploads/subsidy-protocol/';
//                if(!file_exists($folder))
//                    @mkdir($folder);
//                $path = $folder . time() . '_' . rand(1000, 9999).'.'.$file->extension;
//                $file->saveAs($path);
//                if(file_exists($path)) {
//                    $model->file = $path;
//                }
//            }
//            if($model->save()) {
//                return $this->redirect(['view', 'id' => $model->id]);
//            }
//        }

        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, "protocol_file");

            $appealIds = Yii::$app->request->post('appeal-ids');
            if(is_array($appealIds)) {
                $status = AppealStatus::APPEAL_REFERRED_TO_COUNCIL;
                $comment = "Ариза кенгашга ўтказилди.";
                /* @var $appeals Appeal[]*/
                $appeals = Appeal::find()->andFilterWhere(['IN', 'id', $appealIds])->all();
                $appealStatusesOk = true;
                foreach($appeals as $appeal) {
                    if($appeal->appeal_status != AppealStatus::APPEAL_AGENCY_ACCEPTED) {
                        $appealStatusesOk = false;
                        break;
                    }
                }
                if(!$appealStatusesOk) {
                    $errorMsg .= "Аризалар нотўғри статусда.\r\n";
                }

                if(!$appealStatusesOk) {
                    $errorMsg = Yii::t('app-msg', 'Something error.');
                }
            } else {
                $appeals = [];
            }

//            die(arrayToString($appealIds));



            $fileSaved = false;

            if($file != null) {
                $folder = 'uploads/subsidy-protocol/';
                if(!file_exists($folder))
                    @mkdir($folder);
                $path = $folder . time() . '_' . rand(1000, 9999).'.'.$file->extension;
                $fileSaved = $file->saveAs($path);
                if(file_exists($path)) {
                    @unlink($model->file);
                    $model->file = $path;
                }
            }

            if($file != null && !$fileSaved) {
                $errorMsg .= "Файлни сақлашда хатолик бўлди.\r\n";
            }


            if(!$errorMsg) {
                $transaction = Yii::$app->db->beginTransaction();
                $allOk = true;

                while(true) {
                    $saved = $model->save();
                    if(!$saved) {
                        $allOk = false;
                        break;
                    }

                    $allOk = true;
                    foreach ($appeals as $appeal) {
                        $response['message'] = '';
                        $appeal->appeal_status = $status;
                        $appeal->status_at = time();
                        $appeal->status_by = $user->id;
                        $appeal->subsidy_protocol_id = $model->id;
                        $timeline = new StatusTimeline();
                        $timeline->appeal_id = $appeal->id;
                        $timeline->status = $status;
                        $timeline->action_time = time();
                        $timeline->comment = $comment;
                        $timeline->type = $appeal->appeal_type;
                        $timeline->status_by = $user->id;
                        $ok = $timeline->save() && $appeal->save();
                        if(!$ok) {
                            $allOk = false;
                            break;
                        }
                    }
                    if(!$allOk) {
                        break;
                    }


                    $request = Yii::$app->request;
                    $post_commission_members = $request->post('CommissionMembers');
                    $new_commission_members_count = $request->post("new_commission_members_count");

                    if (!empty($post_commission_members))
                    {
                        for($i = 1; $i <= $new_commission_members_count; $i++)
                        {
                            $org_inn = 'org_inn_'.$i;
                            $org_name = 'org_name_'.$i;
                            $fullname = 'fullname_'.$i;
                            if(isset($post_commission_members[$org_inn]) && isset($post_commission_members[$org_name])) {
                                $commission_members = new CommissionMembers();
                                $commission_members->subsidy_protocol_id = $model->id;
                                $commission_members->org_inn = $post_commission_members[$org_inn];
                                $commission_members->org_name = $post_commission_members[$org_name];
                                $commission_members->fullname = $post_commission_members[$fullname];
                                if (!$commission_members->save()) {
                                    $allOk = false;
                                    break;
                                }
                            }
                        }
                    }

                    break;
                }


                if($allOk) {
                    try {
//                        $transaction->rollBack();
                        $transaction->commit();
                        $message = Yii::t('app', 'Data Saved!');
                        Yii::$app->session->setFlash("success", $message);
                        return $this->redirect(['view', 'id' => $model->id]);
                    } catch (\Exception $e) {
                        $transaction->rollBack();
//                            $response['error-msg'] = $e->getMessage();
                        $errorMsg = Yii::t('app-msg', 'Server error.');
                    }
                } else {
                    $transaction->rollBack();
                    $errorMsg = Yii::t('app-msg', 'Server error.');
                }

            }

        }

        if($errorMsg) {
//            die($errorMsg);
            Yii::$app->session->setFlash("danger", $errorMsg);
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing SubsidyProtocol model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        /* @var $user Users*/
        $user = Yii::$app->user->identity;
        if(!$user->isAgency()) {
            return $this->redirect(["index"]);
        }
        $errorMsg = "";

        $model = $this->findModel($id);

        $commission_members = CommissionMembers::find()->where(['subsidy_protocol_id' =>$id])->all();

        if($model->status == null || $model->status == SubsidyProtocol::PROTOCOL_STATUS_NEW) {
            $model->status = SubsidyProtocol::PROTOCOL_STATUS_EDIT;
        }

//        $model->loadDefaultsData();

        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, "protocol_file");

            $appealIds = Yii::$app->request->post('appeal-ids');
            if(is_array($appealIds)) {
                $status = AppealStatus::APPEAL_REFERRED_TO_COUNCIL;
                $comment = "Ариза кенгашга ўтказилди.";
                /* @var $appeals Appeal[]*/
                $appeals = Appeal::find()->andFilterWhere(['IN', 'id', $appealIds])->all();
                $appealStatusesOk = true;
                foreach($appeals as $appeal) {
                    if($appeal->appeal_status != AppealStatus::APPEAL_AGENCY_ACCEPTED) {
                        $appealStatusesOk = false;
                        break;
                    }
                }
                if(!$appealStatusesOk) {
                    $errorMsg .= "Аризалар нотўғри статусда.\r\n";
                }

                if(!$appealStatusesOk) {
                    $errorMsg = Yii::t('app-msg', 'Something error.');
                }
            } else {
                $appeals = [];
            }

//            die(arrayToString($appealIds));


//            $commissionMemberIds = [];
            $updatedCommissionMemberIds = Yii::$app->request->post('commission_member_ids');
            $removedCommissionMemberIds = [];
            foreach($commission_members as $cm) {
//                $commissionMemberIds[] = $cm->id;
                if(!in_array($cm->id, $updatedCommissionMemberIds)) {
                    $removedCommissionMemberIds[] = $cm->id;
                }
            }


            $fileSaved = false;

            if($file != null) {
                $folder = 'uploads/subsidy-protocol/';
                if(!file_exists($folder))
                    @mkdir($folder);
                $path = $folder . time() . '_' . rand(1000, 9999).'.'.$file->extension;
                $fileSaved = $file->saveAs($path);
                if(file_exists($path)) {
                    @unlink($model->file);
                    $model->file = $path;
                }
            }

            if($file != null && !$fileSaved) {
                $errorMsg .= "Файлни сақлашда хатолик бўлди.\r\n";
            }


            if(!$errorMsg) {
                $transaction = Yii::$app->db->beginTransaction();
                $allOk = true;

                while(true) {
                    $saved = $model->save();
                    if(!$saved) {
                        $allOk = false;
                        break;
                    }

                    $allOk = true;
                    foreach ($appeals as $appeal) {
                        $response['message'] = '';
                        $appeal->appeal_status = $status;
                        $appeal->status_at = time();
                        $appeal->status_by = $user->id;
                        $appeal->subsidy_protocol_id = $model->id;
                        $timeline = new StatusTimeline();
                        $timeline->appeal_id = $appeal->id;
                        $timeline->status = $status;
                        $timeline->action_time = time();
                        $timeline->comment = $comment;
                        $timeline->type = $appeal->appeal_type;
                        $timeline->status_by = $user->id;
                        $ok = $timeline->save() && $appeal->save();
                        if(!$ok) {
                            $allOk = false;
                            break;
                        }
                    }
                    if(!$allOk) {
                        break;
                    }

                    $deleted = CommissionMembers::deleteAll(["IN", "id", $removedCommissionMemberIds]);
//                    $deleted = count($removedCommissionMemberIds);
//                    Yii::info("Deleted commission members: $deleted");


                    $request = Yii::$app->request;
                    $post_commission_members = $request->post('CommissionMembers');
                    $post_update_commission_members = $request->post('UpdateCommissionMembers');

                    if (!empty($post_update_commission_members)) {
                        foreach($post_update_commission_members as $key=>$value)
                        {
                            $commission_one = CommissionMembers::findOne($key);
                            $commission_one->fullname = $value;
                            if (!$commission_one->save()) {
                                $allOk = false;
                                break;
                            }
                        }
                    }
                    if(!$allOk) {
                        break;
                    }

                    if (!empty($post_commission_members))
                    {
                        for($i = 1; $i <= count($post_commission_members)/3; $i++)
                        {
                            $commission_members = new CommissionMembers();
                            $org_inn = 'org_inn_'.$i;
                            $org_name = 'org_name_'.$i;
                            $fullname = 'fullname_'.$i;
                            $commission_members->subsidy_protocol_id = $model->id;
                            $commission_members->org_inn = $post_commission_members[$org_inn];
                            $commission_members->org_name = $post_commission_members[$org_name];
                            $commission_members->fullname = $post_commission_members[$fullname];
                            if (!$commission_members->save()) {
                                $allOk = false;
                                break;
                            }
                        }
                    }

                    break;
                }


                if($allOk) {
                    try {
//                        $transaction->rollBack();
                        $transaction->commit();
                        $message = Yii::t('app', 'Data Saved!');
                        Yii::$app->session->setFlash("success", $message);
                        return $this->redirect(['view', 'id' => $model->id]);
                    } catch (\Exception $e) {
                        $transaction->rollBack();
//                            $response['error-msg'] = $e->getMessage();
                        $errorMsg = Yii::t('app-msg', 'Server error.');
                    }
                } else {
                    $transaction->rollBack();
                    $errorMsg = Yii::t('app-msg', 'Server error.');
                }

            }

        }

        if($errorMsg) {
//            die($errorMsg);
            Yii::$app->session->setFlash("danger", $errorMsg);
        }

        return $this->render('update', [
            'model' => $model,
            'commission_members' => $commission_members,
        ]);
    }

    /**
     * Updates an existing SubsidyProtocol model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionConfirm($id)
    {
        $model = $this->findModel($id);
        if($model->status == null && $model->status == SubsidyProtocol::PROTOCOL_STATUS_NEW) {
            $model->status = SubsidyProtocol::PROTOCOL_STATUS_EDIT;
        }

//        $model->loadDefaultsData();

        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, "protocol_file");
            if($file != null) {
                $folder = 'uploads/subsidy-protocol/';
                if(!file_exists($folder))
                    @mkdir($folder);
                $path = $folder . time() . '_' . rand(1000, 9999).'.'.$file->extension;
                $file->saveAs($path);
                if(file_exists($path)) {
                    @unlink($model->file);
                    $model->file = $path;
                    if($model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            } else if($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('confirm', [
            'model' => $model,
        ]);
    }



    public function actionAddAppealsToProtocol() {
        $this->layout = false;
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $response = ['result' => 0, 'refresh' => 0, 'message' => ''];

        /* @var $user Users*/
        $user = Yii::$app->user->identity;
        if(!$user->isAgency()) {
            return $response;
        }

        if(Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            $ids = $data['appeal-ids'];
            $protocolId = $data['subsidy-protocol-id'];
            $protocol = SubsidyProtocol::findOne($protocolId);
            if(count($ids) == 0 || $protocolId == null || $protocol == null || !in_array($protocol->status, [SubsidyProtocol::PROTOCOL_STATUS_NEW, SubsidyProtocol::PROTOCOL_STATUS_EDIT])) {
                $response['message'] = Yii::t('app-msg', 'Something error.');
                $response['refresh'] = 1;
//                $response['message'] = 'Ariza topilmadi. ';
            }
//            $status = $data['status'];
            $status = AppealStatus::APPEAL_REFERRED_TO_COUNCIL;
            $comment = $data['comment'];
            /* @var $appeals Appeal[]*/
            $appeals = Appeal::find()->andFilterWhere(['IN', 'id', $ids])->all();
            $statuses_ok = true;
            foreach($appeals as $appeal) {
                if($appeal->appeal_status != AppealStatus::APPEAL_AGENCY_ACCEPTED) {
                    $statuses_ok = false;
                    break;
                }
            }
            if(!$statuses_ok) {
                $response['message'] = Yii::t('app-msg', 'Something error.');
                $response['refresh'] = 1;
            }

            $transaction = Yii::$app->db->beginTransaction();
            $allOk = true;
            foreach ($appeals as $appeal) {
                $response['message'] = '';
                $appeal->appeal_status = $status;
                $appeal->status_at = time();
                $appeal->status_by = $user->id;
                $appeal->subsidy_protocol_id = $protocolId;
                $timeline = new StatusTimeline();
                $timeline->appeal_id = $appeal->id;
                $timeline->status = $status;
                $timeline->action_time = time();
                $timeline->comment = $comment;
                $timeline->type = $appeal->appeal_type;
                $timeline->status_by = $user->id;
                $ok = false;
                if($timeline->save()) {
                    if($appeal->save()) {
                        $ok = true;
                    }
                }
                if(!$ok) {
                    $allOk = false;
                    break;
                }
            }
            if($allOk) {
                try {
                    $transaction->commit();
                    $response['result'] = 1;
                    $response['refresh'] = 1;
                    $response['message'] = Yii::t('app', 'Data Saved!');
                } catch (\Exception $e) {
                    $transaction->rollBack();
                    $response['error-msg'] = $e->getMessage();
                    $response['message'] = Yii::t('app-msg', 'Server error.');
                }
            } else {
                $response['message'] = Yii::t('app-msg', 'Server error.');
                $transaction->rollBack();
            }
        }

        return $response;
    }

    /**
     * Deletes an existing SubsidyProtocol model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
//        $this->findModel($id)->delete();
        $model = $this->findModel($id);
        $model->status = SubsidyProtocol::PROTOCOL_STATUS_DELETED;
        if ($model->save()){
            Yii::$app->session->setFlash('success', Yii::t('app', 'Data Updated!'));
        } else {
            Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Updated!'));
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the SubsidyProtocol model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SubsidyProtocol the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SubsidyProtocol::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionSoliqInn()
    {
        $request = Yii::$app->request;
        $tin = $request->post()['inn'];

        $client = new Client();
        // vdd($tin);
        $url = 'https://my.soliq.uz/services/np1/yurbytin?tin='.$tin;
        $response = $client->request(
            'GET',
            $url,
            [
                'auth' => [
                    'alfainvest', '67bcf84a5dxe053cx50a$'
                ],
            ]
        );
        $return = $response->getBody()->getContents();
        $data = json_decode($return);
        if (!empty(json_decode($return)) && !empty($data->tin)) {
            return $data->name;
        } else {
            return 'Бундай ИНН билан рўйҳатдан утган ташкилот топилмади!';
        }
    }

    public function actionHtmlCommission()
    {
        $request = Yii::$app->request;
        $count = $request->get()['count'];
        // vdd($count);
        if (!empty($count)) {
            // input name
            $inn = 'CommissionMembers[org_inn_'.$count.']';
            $org_name = 'CommissionMembers[org_name_'.$count.']';
            $full_name = 'CommissionMembers[fullname_'.$count.']';
            // input id
            $inn_id = 'soliq_inn_'.$count; 
            $org_name_id = 'org_name_'.$count;
            $org_name_hidden_id = 'org_name_hidden_id_'.$count;
            $new_and_close = 'new_and_close_'.$count;
            
            return '
                <div class="row new-row" id="'.$new_and_close.'">
                    <div class="col-xl-3">
                        <div class="form-group row fv-plugins-icon-container margin-row" >
                            <label>Ташкилот ИНН</label>
                            <div class="input-group">
                                <input type="number" class="form-control form-control-lg form-control-solid soliq_inn" placeholder="Поиск инн" name="'.$inn.'" id="'.$inn_id.'">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" onclick="soliqInn('.$count.');">
                                        <span>
                                            <i class="flaticon2-search-1 icon-md"></i>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>                        
                    <div class="col-xl-4">
                        <div class="form-group row fv-plugins-icon-container margin-row">
                            <label>Ташкилот Номи</label>
                            <div class="input-group">
                                <input type="hidden" class="form-control form-control-lg form-control-solid" name="'.$org_name.'" value="" id="'.$org_name_hidden_id.'">
                                <input type="text" class="form-control form-control-lg form-control-solid" placeholder="Ташкилот Номи" value="" disabled id="'.$org_name_id.'">
                            </div>
                        </div>
                    </div>                        
                    <div class="col-xl-5">
                        <div class="form-group row fv-plugins-icon-container margin-row">
                            <label>Маъсул шаҳс Ф.И.О</label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-lg form-control-solid input_colose" placeholder="Ф.И.О" name="'.$full_name.'">                                  
                                <button type="button" class="btn btn-outline-danger btn-xs" title="Удалить" style="margin-top: 10px;max-height: 23px;" onclick="closeCommission('.$count.');">
                                    <i class="la la-close ml-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div> 
            ';
        } else {
           return 'Limit not found!';
        }        
    }

    public function actionCommissionCreate()
    {
        $request = Yii::$app->request;
        $post = $request->post();
        $post_commission_members = $request->post('CommissionMembers');
        $post_update_commission_members = $request->post('UpdateCommissionMembers');

        if (!empty($post_update_commission_members)) {
            foreach($post_update_commission_members as $key=>$value)
            {
                $commission_one = CommissionMembers::findOne(explode( '_', $key)[2]);
                $commission_one->fullname = $value;
                if (!$commission_one->save()) {
                    return $this->redirect('index');
                } 
            }
        }  

        if (!empty($post_commission_members)) 
        {
            for($i = 1; $i <= count($post_commission_members)/3; $i++)
            {
                $commission_members = new CommissionMembers();
                $org_inn = 'org_inn_'.$i;
                $org_name = 'org_name_'.$i;
                $fullname = 'fullname_'.$i;
                $commission_members->subsidy_protocol_id = $post_commission_members['subsidy_protocol_id'];
                $commission_members->org_inn = $post_commission_members[$org_inn];
                $commission_members->org_name = $post_commission_members[$org_name];
                $commission_members->fullname = $post_commission_members[$fullname];
                if (!$commission_members->save()) {
                    return $this->redirect('index');
                } 
            }            
            return $this->redirect('index');

        }
        else {
            return $this->redirect('index');
        }  
    }

    public function actionCommissionDelete()
    {
        $request = Yii::$app->request;
        $id = $request->get('id');

        if (!empty($id)) {
            $model = CommissionMembers::findOne($id);
            if ($model->delete()) {
                return 1;
            } else {
                return 0;
            }
            
        } else {
           return 'no data';
        }
        
    }


}
