<?php

namespace app\modules\structure\controllers;

use Yii;
use app\modules\admin\models\Users;
use app\models\User;
use app\models\BaseModel;
use app\controllers\BaseController;
use app\modules\structure\models\OrgClassification;
use app\modules\structure\models\OrgClassificationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * OrgClassificationController implements the CRUD actions for OrgClassification model.
 */
class OrgClassificationController extends BaseController
{
    public $info;
    /**
     * {@inheritdoc}
     */
    public function actionValidate()
    {
        $model = new OrgClassification();
        $request = \Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

    /**
     * Lists all OrgClassification models.
     * @return mixed
     */
    public function actionIndex()
    {
        $tree = OrgClassification::getTreeViewHtmlForm();
        $orgClass = OrgClassification::find()->where(['parent_id' => null])->asArray()->all();
        return $this->render('index', [
            'orgClass' => $orgClass,
            'tree' => $tree,
        ]);
    }

    /**
     * Displays a single OrgClassification model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new OrgClassification model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OrgClassification();
        if (Yii::$app->request->post()) {
            $model->load($data = Yii::$app->request->post());
            $names = $data['OrgClassification'];
            $model->parent_id = Yii::$app->request->post('parent_id');
            $model->status = $model::STATUS_ACTIVE;
            if ((!empty($names['name_uz']) || !empty($names['name_ru']) || !empty($names['name_en'])) && $model->save()) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Data Saved!'));
            }else{
                Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Saved!'));
            }
            return $this->redirect(['index']);
        }
        return $this->renderAjax('create', [
            'model' => $model,
            'form' => '_form',
        ]);
    }

    /**
     * Updates an existing OrgClassification model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load($data = Yii::$app->request->post())) {
            $names = $data['OrgClassification'];
            if ((!empty($names['name_uz']) || !empty($names['name_ru']) || !empty($names['name_en'])) && $model->save()){
                Yii::$app->session->setFlash('success', Yii::t('app', 'Data Updated!'));
            } else {
                Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Updated!'));
            }
            return $this->redirect(['index']);
        }
        return $this->renderAjax('update', [
            'model' => $model,
            'form' => '_form',
        ]);

    }

    public function actionGetItemsAjax(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $id = Yii::$app->request->get('id');
        $result = OrgClassification::findOne($id);
        $response = [];
        if (!empty($id)){
            $response['data'] = $result;
            // $response['created_at_text'] = date("d.m.Y H:i", $response['data']['created_at']);
            // $response['created_by_text'] = Users::findOne($response['data']['created_by'])->fullname;
            // $response['updated_at_text'] = date("d.m.Y H:i", $response['data']['updated_at']);
            // $response['updated_by_text'] = Users::findOne($response['data']['updated_by'])->fullname;
            $response['status'] = 'success';
            return $response;
        }
        return false;
    }

    /**
     * Deletes an existing OrgClassification model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @return bool
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDeleteAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $id = Yii::$app->request->get('id');
        if (!empty($id)){
            $child = OrgClassification::find()->where(['parent_id' => $id, 'status' => BaseModel::STATUS_ACTIVE])->one();
            if (empty($child)) {
                $model = $this->findModel($id);
                $model->status = $model::STATUS_DELETED;
                $model->save();
                Yii::$app->session->setFlash('success', Yii::t('app', 'Data Deleted!'));
            }else {
                Yii::$app->session->setFlash('danger', Yii::t('app', 'Error, First You Should Delete Items !'));
            }
            return $this->redirect(['index']);
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));

    }

    /**
     * Finds the OrgClassification model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OrgClassification the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OrgClassification::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
