<?php

namespace app\modules\manuals\controllers;

use Yii;
use app\components\MySoliq;
use app\models\BaseModel;
use app\modules\structure\models\OrgClassification;
use app\modules\manuals\models\Contragent;
use app\modules\manuals\models\MysoliqRegion;
use app\modules\manuals\models\MysoliqDistrict;
use app\modules\manuals\models\ContragentSearch;
use app\modules\manuals\models\ContragentOrgClassification;
use app\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * ContragentController implements the CRUD actions for Contragent model.
 */
class ContragentController extends BaseController
{

    /**
     * Lists all Contragent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContragentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Contragent model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(int $id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Contragent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Contragent();
        $modely = new ContragentOrgClassification();
        if ($model->load($data = Yii::$app->request->post())) {
            $result = $data['ContragentOrgClassification'];
            try {
                if ($model->save()){
                    $transaction = Yii::$app->db->beginTransaction();
                    foreach ($result['org_classification_id'] as $key) {

                        $newModely = new ContragentOrgClassification();
                        $newModely->org_classification_id = $key;
                        $newModely->status = BaseModel::STATUS_ACTIVE;
                        $newModely->contragent_id = $model->id;

                        if (!$newModely->validate()) throw new Exception ("Xatolik validatsiyadan o'tmadi!");
                        if (!$newModely->save()) throw new Exception ("Xatolik saqlanmadi o'tmadi!");
                    }
                    $transaction->commit();
                    Yii::info('All models saved!');

                    Yii::$app->session->setFlash('success', Yii::t('app', 'Data Saved!'));
                } else {
                    Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Saved!'));
                }
            } catch (Exception $ex) {
                Yii::warning($ex->getMessage());
                $transaction->rollBack();
            }
            return $this->redirect(['index']);
        }
        
        return $this->render('create', [
            'model' => $model,
            'modely' => $modely,
        ]);
    }

    // public function actionInnAjax()
    // {
    //     if (Yii::$app->request->isPost) {
    //         $id = Yii::$app->request->post('id');
    //         $response = [];
    //         $response['status'] = false;
    //         if (isset($id)) {
    //             $result = Maxsulot::find()
    //             ->alias('m')
    //             ->select(['mt.id','mt.name','narx.price'])
    //             ->leftJoin(['mt' => 'maxsulot_turi'],'mt.id = m.maxsulotTuri_id')
    //             ->leftJoin(['narx' => MaxsulotNarxi::find()->where(['status' => 1])
    //             ],'narx.wms_item_id = m.id')
    //             ->where(['m.id' => $id])
    //             ->asArray()
    //             ->one();

    //             $response['status'] = true;
    //             $response['result'] = $result; 
    //             $response['id'] = $id; 
    //             // $response['result2'] = $forPrice; 
    //         }
    //         return \yii\helpers\Json::encode($response);
    //     }
    // }

    /**
     * @param int $id
     * @return string|yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate(int $id)
    {
        $model = $this->findModel($id);
        $modely = new ContragentOrgClassification();
        $modelys = ContragentOrgClassification::find()->where(['contragent_id' => $id])->asArray()->all();
        if (!empty($model->region_id)) {
            $region = MysoliqRegion::find()->where(['code' => $model->region_id])->one();
            $region_name = $region['name_'.Yii::$app->language] ?? '';
        }
        if (!empty($model->district_id)) {
            $district = MysoliqDistrict::find()->where(['region_code' => $region->code, 'code' => $model->district_id])->asArray()->one();
            $district_name = $district['name_'.Yii::$app->language] ?? '';
        }

        if ($model->load($data = Yii::$app->request->post())) {
            $result = $data['ContragentOrgClassification'];
            $clear = ContragentOrgClassification::deleteAll(['contragent_id'=>$id]);
            try {
                if ($model->save()){
                    $transaction = Yii::$app->db->beginTransaction();
                    foreach ($result['org_classification_id'] as $key) {

                        $newModely = new ContragentOrgClassification();
                        $newModely->setAttributes([
                            'org_classification_id' => $key,
                            'contragent_id' =>$model->id,
                            'status' =>BaseModel::STATUS_ACTIVE
                        ]);

                        if (!$newModely->validate()) throw new Exception ("Xatolik validatsiyadan o'tmadi!");
                        if (!$newModely->save()) throw new Exception ("Xatolik saqlanmadi o'tmadi!");
                    }
                    $transaction->commit();
                    Yii::info('All models saved!');

                    Yii::$app->session->setFlash('success', Yii::t('app', 'Data Saved!'));
                } else {
                    Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Saved!'));
                }
            } catch (Exception $ex) {
                Yii::warning($ex->getMessage());
                $transaction->rollBack();
            }
            return $this->redirect(['index']);
        }
        if (Yii::$app->request->isAjax){
            return $this->renderAjax('update', [
                'model' => $model,
                'modely' => $modely,
                'modelys' => $modelys,
                'region_name' => $region_name,
                'district_name' => $district_name,
            ]);
        }

        return $this->render('update', [
            'region_name' => $region_name,
            'district_name' => $district_name,
            'model' => $model,
            'modely' => $modely,
            'modelys' => $modelys,
        ]);
    }

    /**
     * @param $id
     * @return string|yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionCopy($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isPost) {
            $model = new Contragent();
            if ($model->load(Yii::$app->request->post())) {
                if ($model->save()){
                    Yii::$app->session->setFlash('success', Yii::t('app', 'Data Copy!'));
                } else {
                    Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Copy!'));
                }
                return $this->redirect(['index']);
            }
        }
        if (Yii::$app->request->isAjax){
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
        return $this->render('copy', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionRemove($id)
    {
        $model = $this->findModel($id);
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->deleteAll($model);
    }

    public function actionSearchByTin()
    {
        if (Yii::$app->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            $mysoliq = new MySoliq();
            $tin = Yii::$app->request->post('inn');
            $data = json_decode($mysoliq->yur($tin), true);
            if (!empty($data['tin'])) {
                $response = ['status'=>'success','data'=>$data];
            } else {
                $response = ['status'=>'fail', 'errorMsg'=>Yii::t('app', 'Error with Tin')];
            }
            return $response;
        }
    }


    public function actionTable()
    {
        Yii::$app->request->get();
        
        $contr = Contragent::find()->where(['!=', 'status', BaseModel::STATUS_DELETED])->asArray()->all();
        $org_class = OrgClassification::find()->where(['!=', 'status', BaseModel::STATUS_DELETED])->asArray()->all();
        $contr_org_class = ContragentOrgClassification::find()->where(['!=', 'status', BaseModel::STATUS_DELETED])->asArray()->all();
        return $this->render('table', [
            'contr' => $contr,
            'org_class' => $org_class,
            'contr_org_class' => $contr_org_class,
        ]);
    }

    /**
     * @param $id
     * @return Contragent|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Contragent::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
