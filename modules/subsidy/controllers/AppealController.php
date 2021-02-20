<?php

namespace app\modules\subsidy\controllers;

use app\models\Attachment;
use app\modules\manuals\models\AppealStatus;
use app\modules\manuals\models\AppealType;
use app\modules\manuals\models\Contragent;
use app\modules\manuals\models\MysoliqDistrict;
use app\modules\manuals\models\MysoliqRegion;
use app\modules\manuals\models\PlantSchema;
use app\modules\subsidy\models\ProjectSubsidy;
use app\modules\subsidy\models\ProjectSubsidyWork;
use Yii;
use app\modules\subsidy\models\Appeal;
use app\modules\subsidy\models\AppealAttachment;
use app\modules\subsidy\models\AppealSearch;
use app\modules\subsidy\models\ProjectSubsidyNavType;
use app\modules\subsidy\models\StatusTimeline;
use Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\Response;
use xj\qrcode\QRcode; // composer require xj/yii2-qrcode-widget
use xj\qrcode\widgets\Text;

/**
 * AppealController implements the CRUD actions for Appeal model.
 */
class AppealController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    // 'delete' => ['POST'],
                ],
            ],
        ];
    }

    
    /**
     * Lists all Appeal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $user = Yii::$app->user->identity;
        $contr_agent = Contragent::find()->where(['department_id' => $user->department_id])->one();
        $appeals = Appeal::find()->where(['contragent_id' => $contr_agent->id])->orderBy(['created_at'=>SORT_DESC])->all();
        $project_subsidy = ProjectSubsidy::find()->where(['contragent_id' => $contr_agent->id])->orderBy(['created_at'=>SORT_DESC])->all();
        $region = MysoliqRegion::getRegion($contr_agent->region_id);
//        var_dump($contr_agent); exit;

        return $this->render('index', [
            'contr_agent' => $contr_agent,
            'appeals' => $appeals,
            'project_subsidy' => $project_subsidy,
            'region' => $region,
        ]);
    }

    /**
     * Displays a single Appeal model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('appeal-view', [
                'appeal' => $this->findModel($id),
            ]);
        }
        // $statuses = StatusTimeline::find()->where(['appeal_id' => $id])->orderBy(['action_time' => SORT_ASC])->all();
        
        return $this->render('view', [
            'appeal' => $this->findModel($id),
            // 'statuses' => $statuses,
        ]);
    }

    /**
     * Creates a new Appeal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $user = Yii::$app->user->identity;

        $post = $request->post();

        $post_project_subsidy = $post['ProjectSubsidy'];
        $post_project_subsidy_nav_type = $post['ProjectSubsidyNavType'];
        $post_project_subsidy_work = $post['ProjectSubsidyWork'];
        $post_appeal_attachment = $post['AppealAttachment'];

        $appeal = new Appeal();
        $project_subsidy = new ProjectSubsidy();
        $project_subsidy_work = new ProjectSubsidyWork();
        $project_subsidy_nav_type = new ProjectSubsidyNavType();
        $appeal_attachment = new AppealAttachment();
        $attachment = new Attachment();
        $status_time_line = new StatusTimeline();

        $contr_agent = Contragent::find()->where(['department_id' => $user->department_id])->one();
        $region = MysoliqRegion::getRegion($contr_agent->region_id);
        $district = MysoliqDistrict::getDistrict($contr_agent->district_id, $contr_agent->region_id);
        $appeal_attachment_type = AppealAttachment::doc_type;
      
        // $attachment->file_1 = UploadedFile::getInstance($attachment, 'file_1');
        // $attachment->name->saveAs('uploads/document/' . $attachment->name->baseName . '.' . $attachment->name->extension);
        
        // vdd(count($post_appeal_attachment));
    
        if ($appeal->load($post) && $appeal->save())
        {
            if ($appeal->appeal_type == 1)
            {

                if ($project_subsidy->load($post))
                {
                    $project_subsidy->appeal_id = $appeal->id;
                    $project_subsidy->contragent_id = $post_project_subsidy['contragent_id'];
                    $project_subsidy->region_id = $post_project_subsidy['region_id'];
                    $project_subsidy->district_id = $post_project_subsidy['district_id'];
                    $project_subsidy->contur_number = $post_project_subsidy['contur_number'];
                    $project_subsidy->counter_ga = $post_project_subsidy['counter_ga'];
                    $project_subsidy->water_pump_count = $post_project_subsidy['water_pump_count'];
                    $project_subsidy->bonitet_ball = $post_project_subsidy['bonitet_ball'];
                    $project_subsidy->plant_all_area_ga = $post_project_subsidy['plant_all_area_ga'];
                    $project_subsidy->plant_address = $post_project_subsidy['plant_address'];
                    $project_subsidy->plant_schema_id = $post_project_subsidy['plant_schema_id'];
                    $project_subsidy->plant_all_count = $post_project_subsidy['plant_all_count'];
                    $project_subsidy->end_date = $post_project_subsidy['end_date'];
                    $project_subsidy->job_count = $post_project_subsidy['job_count'];
                    $project_subsidy->project_all_price = $post_project_subsidy['project_all_price'];
                    $project_subsidy->status_project = $appeal->appeal_status;
                    $project_subsidy->created_at = time();
                    $project_subsidy->status = 1;

                    if (!$project_subsidy->save()){
                        return $this->render('create', [
                            'appeal' => $appeal,
                            'project_subsidy' => $project_subsidy,
                            'project_subsidy_work' => $project_subsidy_work,
                            'contr_agent' => $contr_agent,
                            'project_subsidy_nav_type' => $project_subsidy_nav_type,
                            'attachment' => $attachment,
                            'appeal_attachment_type' => $appeal_attachment_type,
                            'region' => $region,
                            'district' => $district,
                        ]);
                    }
                    // project subsidy ny type
                    if($project_subsidy_nav_type->load($post))
                    {
                        for ($i = 0; $i < count($post_project_subsidy_nav_type['nav_type_id']); $i++) {
                            $project_subsidy_nav_type = new ProjectSubsidyNavType();

                            $project_subsidy_nav_type->project_subsidy_id = $project_subsidy->id;
                            $project_subsidy_nav_type->nav_type_id = $post_project_subsidy_nav_type['nav_type_id'][$i];
                            $project_subsidy_nav_type->area_ga = $post_project_subsidy_nav_type['area_ga'];
                            $project_subsidy_nav_type->created_at = time();
                            $project_subsidy_nav_type->save();
                        }
                    }
                    // project subsidy sub work save
                    if($project_subsidy_work->load($post))
                    {
                        for ($i = 1; $i <= 7; $i++) {
                            $project_subsidy_work = new ProjectSubsidyWork();

                            $sum = $post_project_subsidy_work["self_finance_sum_".$i] + $post_project_subsidy_work["subsidy_sum_".$i] + $post_project_subsidy_work["credit_sum_".$i];
                            $project_subsidy_work->project_subsidy_id = $project_subsidy->id;
                            $project_subsidy_work->work_name = $post_project_subsidy_work["work_name_".$i];
                            $project_subsidy_work->price = $sum;
                            $project_subsidy_work->self_finance_sum = $post_project_subsidy_work["self_finance_sum_".$i];
                            $project_subsidy_work->subsidy_sum = $post_project_subsidy_work["subsidy_sum_".$i];
                            $project_subsidy_work->credit_sum = $post_project_subsidy_work["credit_sum_".$i];
                            $project_subsidy_work->created_at = time();
                            $project_subsidy_work->save();
                        }
                    }
                    // Attachment 

                    if (Yii::$app->request->isPost) {
                        $file = [];
                        $attachment_id = [];
                        for($i = 1; $i <= 4; $i++){
                            $attachment = new Attachment();

                            $file[$i] = UploadedFile::getInstance($attachment, 'file_'.$i);

                            if ($attachment->validate() && !empty($file[$i])) {   
                                $file_name = time() . '_' . rand(1000, 9999);                  
                                $file[$i]->saveAs('uploads/document/' . $file_name . '.' . $file[$i]->extension);
                               
                                $attachment->name =  $file[$i]->name;
                                $attachment->size =  $file[$i]->size;
                                $attachment->extension =  $file[$i]->type;
                                $attachment->path ='uploads/document/'.$file_name . '.' . $file[$i]->extension;
                                $attachment->save();
                                $attachment_id[$i] = $attachment->id;
                            }          
                            
                        } 
                    }

                    // appeal attachment

                    if($appeal_attachment->load($post))
                    {
                        for ($i = 1; $i <= count($post_appeal_attachment); $i++) {
                                $appeal_attachment = new AppealAttachment();

                                $appeal_attachment->appeal_id = $appeal->id;
                                $appeal_attachment->attachment_id = !empty($attachment_id[$i])?$attachment_id[$i]:'';
                                $appeal_attachment->type = $post_appeal_attachment['type_'.$i];
    
                                $appeal_attachment->save();
                        }
                    }

                    if($appeal->id){
                        $status_time_line->appeal_id = $appeal->id;
                        $status_time_line->action_time = time();
                        $status_time_line->comment = 'Янги лойиҳа яратилди';
                        $status_time_line->status = $appeal->appeal_status;
                        $status_time_line->type = 1;
                        $status_time_line->status_by = $contr_agent->id;
                        $status_time_line->save();
                    }
                    

                    return $this->redirect('index');
                }
                // vdd($appeal->getErrors());                       

                return $this->render('create', [
                    'appeal' => $appeal,
                    'project_subsidy' => $project_subsidy,
                    'project_subsidy_work' => $project_subsidy_work,
                    'contr_agent' => $contr_agent,
                    'project_subsidy_nav_type' => $project_subsidy_nav_type,
                    'attachment' => $attachment,
                    'appeal_attachment_type' => $appeal_attachment_type,
                    'region' => $region,
                    'district' => $district,
                ]);
            }
            return $this->render('create', [
                'appeal' => $appeal,
                'project_subsidy' => $project_subsidy,
                'project_subsidy_work' => $project_subsidy_work,
                'contr_agent' => $contr_agent,
                'project_subsidy_nav_type' => $project_subsidy_nav_type,
                'attachment' => $attachment,
                'appeal_attachment_type' => $appeal_attachment_type,
                'region' => $region,
                'district' => $district,
            ]);
        }
        return $this->render('create', [
            'appeal' => $appeal,
            'project_subsidy' => $project_subsidy,
            'project_subsidy_work' => $project_subsidy_work,
            'contr_agent' => $contr_agent,
            'project_subsidy_nav_type' => $project_subsidy_nav_type,
            'attachment' => $attachment,
            'appeal_attachment_type' => $appeal_attachment_type,
            'region' => $region,
            'district' => $district,
        ]);

    }

    /**
     * Updates an existing Appeal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $user = Yii::$app->user->identity;

        $post = $request->post();

        $post_project_subsidy = $post['ProjectSubsidy'];
        $post_project_subsidy_nav_type = $post['ProjectSubsidyNavType'];
        $post_project_subsidy_work = $post['ProjectSubsidyWork'];
        $post_appeal_attachment = $post['AppealAttachment'];

        
        $appeal = Appeal::findOne($id);
        $contr_agent = $appeal->contragent;
        $project_subsidy = $appeal->projectSubsidy;
        $appeal_attachment = $appeal->appealAttachments;
        $project_subsidy_work = $project_subsidy->projectSubsidyWorks;
        
        $region = MysoliqRegion::getRegion($contr_agent->region_id);
        $district = MysoliqDistrict::getDistrict($contr_agent->district_id, $contr_agent->region_id);
        $project_subsidy_nav_type = ProjectSubsidyNavType::find()->where(['project_subsidy_id'=>$project_subsidy->id])->one();

        $attachment = new Attachment();
        
        // vdd($project_subsidy_work->load($post));

        if ($appeal->load($post) && $appeal->save()) {
            if ($project_subsidy->load($post) && $project_subsidy->save()) {
                if ($project_subsidy_nav_type->load($post) && $project_subsidy_nav_type->save()) {
                    if ($project_subsidy_work->load($post) && $project_subsidy_work->save()) {
                        
                    }
                    return $this->render('update', [
                        'appeal' => $appeal,
                        'project_subsidy' => $project_subsidy,
                        'project_subsidy_work' => $project_subsidy_work,
                        'contr_agent' => $contr_agent,
                        'project_subsidy_nav_type' => $project_subsidy_nav_type,
                        'attachment' => $attachment,
                        'appeal_attachment' => $appeal_attachment,
                        'region' => $region,
                        'district' => $district,
                    ]);
                }
                return $this->render('update', [
                    'appeal' => $appeal,
                    'project_subsidy' => $project_subsidy,
                    'project_subsidy_work' => $project_subsidy_work,
                    'contr_agent' => $contr_agent,
                    'project_subsidy_nav_type' => $project_subsidy_nav_type,
                    'attachment' => $attachment,
                    'appeal_attachment' => $appeal_attachment,
                    'region' => $region,
                    'district' => $district,
                ]);
            }
            return $this->render('update', [
                'appeal' => $appeal,
                'project_subsidy' => $project_subsidy,
                'project_subsidy_work' => $project_subsidy_work,
                'contr_agent' => $contr_agent,
                'project_subsidy_nav_type' => $project_subsidy_nav_type,
                'attachment' => $attachment,
                'appeal_attachment' => $appeal_attachment,
                'region' => $region,
                'district' => $district,
            ]);
        }
        return $this->render('update', [
            'appeal' => $appeal,
            'project_subsidy' => $project_subsidy,
            'project_subsidy_work' => $project_subsidy_work,
            'contr_agent' => $contr_agent,
            'project_subsidy_nav_type' => $project_subsidy_nav_type,
            'attachment' => $attachment,
            'appeal_attachment' => $appeal_attachment,
            'region' => $region,
            'district' => $district,
        ]);
    }

    public function actionAppealDocument($id)
    {
        $user = Yii::$app->user->identity;

        $appeal = Appeal::findOne($id);
        $contr_agent = $appeal->contragent;
        $project_subsidy = $appeal->projectSubsidy;
        $appeal_attachment = $appeal->appealAttachments;
        $project_subsidy_work = $project_subsidy->projectSubsidyWorks;

        $region = MysoliqRegion::getRegion($contr_agent->region_id);
        $district = MysoliqDistrict::getDistrict($contr_agent->district_id, $contr_agent->region_id);
        $subsidy_nav_type = ProjectSubsidyNavType::find()->where(['project_subsidy_id' => $project_subsidy->id])->all();
        
        // vdd($appeal_attachment);
        return $this->render('appeal-document', [
            'appeal' => $appeal,
            'project_subsidy' => $project_subsidy,
            'project_subsidy_work' => $project_subsidy_work,
            'contr_agent' => $contr_agent,
            'region' => $region,
            'district' => $district,
            'subsidy_nav_type' => $subsidy_nav_type,
            'appeal_attachment' => $appeal_attachment,
        ]);

    }

    public function actionMpdfAppeal($id) {
        $appeal = Appeal::findOne($id);
        $contr_agent = $appeal->contragent;
        $project_subsidy = $appeal->projectSubsidy;
        $appeal_attachment = $appeal->appealAttachments;

        $region = MysoliqRegion::getRegion($contr_agent->region_id);
        $district = MysoliqDistrict::getDistrict($contr_agent->district_id, $contr_agent->region_id);
        if (!empty($appeal)) {
            $content = $this->renderPartial('_pdf-appeal', [
                'region' => $region,
                'district' => $district,
                'contr_agent' => $contr_agent,
                'project_subsidy' => $project_subsidy,
                'appeal_attachment' => $appeal_attachment,
                'appeal' => $appeal
                ]);
            $pdf = new \kartik\mpdf\Pdf([
                'mode' => \kartik\mpdf\Pdf::MODE_UTF8, // leaner size using standard fonts
                'content' => $content,
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
                'cssInline' => '.kv-heading-1{font-size:18px}',
                    'options' => [
                        'title' => 'Factuur',
                        'subject' => 'Generating PDF files via yii2-mpdf extension has never been easy'
                    ],
                    'methods' => [
                        'SetHeader' => ['Создан на: ' . date("Y-m-d H:i:s", time())],
                        'SetFooter' => ['|Страница {PAGENO}|'],
                    ]
                ]);
            return $pdf->render();
        }
        return $this->redirect('index');

    }

    public function actionMpdfSubsidy($id) {
        $appeal = Appeal::findOne($id);
        $contr_agent = $appeal->contragent;
        $project_subsidy = $appeal->projectSubsidy;
        $project_subsidy_work = $project_subsidy->projectSubsidyWorks;

        $subsidy_nav_type = ProjectSubsidyNavType::find()->where(['project_subsidy_id' => $project_subsidy->id])->all();
        if (!empty($appeal)) {
        $content = $this->renderPartial('_pdf-subsidy', [
            'contr_agent' => $contr_agent,
            'project_subsidy' => $project_subsidy,
            'project_subsidy_work' => $project_subsidy_work,
            'subsidy_nav_type' => $subsidy_nav_type,
            'appeal' => $appeal
            ]);
        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_UTF8, // leaner size using standard fonts
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
                'options' => [
                    'title' => 'Factuur',
                    'subject' => 'Generating PDF files via yii2-mpdf extension has never been easy'
                ],
                'methods' => [
                    'SetHeader' => ['Создан на: ' . date("Y-m-d H:i:s", time())],
                    'SetFooter' => ['|Страница {PAGENO}|'],
                ]
            ]);
            return $pdf->render();
        }
        return $this->redirect('index');
    }

    public function actionAppealSendAgency()
    {
        $this->layout = false;
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $response = ['result' => 0, 'refresh' => 0, 'message' => ''];

        /* @var $user Users*/
        $user = Yii::$app->user->identity;

        if(Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            $id = $data['appeal-id'];
            $status = $data['status'];
            $appeal = Appeal::findOne(['id' => $id]);

            if(!empty($appeal)) {
                $response['message'] = '';
                switch ($status) {
                    case AppealStatus::APPEAL_NEW:
                        if($appeal->appeal_status == AppealStatus::APPEAL_NEW) {
                            $appeal->appeal_status = AppealStatus::APPEAL_SENT_TO_AGENCY;
                            $appeal->status_at = time();
                            $appeal->status_by = $user->id;
                            $timeline = new StatusTimeline();
                            $timeline->appeal_id = $appeal->id;
                            $timeline->action_time = time();
                            $timeline->comment = 'Янги яратилган лойиҳа агинтликга юборилди!';
                            $timeline->status = AppealStatus::APPEAL_SENT_TO_AGENCY;
                            $timeline->type = AppealType::TYPE_SUBSIDY; /////
                            $timeline->status_by = $user->id;
                            if($timeline->save()) {
                                if($appeal->save()) {
                                    $response['message'] = Yii::t('app', 'Data Saved!');
                                    $response['refresh'] = 1;
                                }
                            }
                        } else {
                            $response['message'] = Yii::t('app-msg', 'Something error.'); //Arizani statusda xatolik.
                            $response['refresh'] = 2;
                        }
                        break;
                        case AppealStatus::APPEAL_AGENCY_RETURNED:
                            if($appeal->appeal_status == AppealStatus::APPEAL_AGENCY_RETURNED) {
                                $appeal->appeal_status = AppealStatus::APPEAL_SENT_TO_AGENCY;
                                $appeal->status_at = time();
                                $appeal->status_by = $user->id;
                                $timeline = new StatusTimeline();
                                $timeline->appeal_id = $appeal->id;
                                $timeline->action_time = time();
                                $timeline->comment = 'Камчиликларни тузатиб қайта агинтликга юборилди!';
                                $timeline->status = AppealStatus::APPEAL_SENT_TO_AGENCY;
                                $timeline->type = AppealType::TYPE_SUBSIDY; /////
                                $timeline->status_by = $user->id;
    
                                if($timeline->save()) {
                                    if($appeal->save()) {
                                        $response['message'] = Yii::t('app', 'Data Saved!');
                                        $response['refresh'] = 1;
                                    }
                                }
                            } else {
                                $response['message'] = Yii::t('app-msg', 'Something error.'); //Arizani statusda xatolik.
                                $response['refresh'] = 2;
                            }
                            break;
                }
            } else {
                $response['message'] = 'Ariza topilmadi. ';
            }
        }

        return $response;
    }
    /**
     * Deletes an existing Appeal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if ($this->findModel($id)->delete()){
            Yii::$app->session->setFlash('success', Yii::t('app', 'Data Delete!'));
        } else {
            Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Delete!'));
        }
        // $this->findModel($id)->delete();
        // Yii::$app->response->format = Response::FORMAT_JSON;

        return $this->redirect(['index']);
    }

    /**
     * Finds the Appeal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Appeal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Appeal::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
