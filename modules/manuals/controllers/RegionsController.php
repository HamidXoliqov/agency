<?php

namespace app\modules\manuals\controllers;

use Yii;
use app\modules\manuals\models\Regions;
use app\modules\manuals\models\RegionsSearch;
use app\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * RegionsController implements the CRUD actions for Regions model.
 */
class RegionsController extends BaseController
{
    public function actionValidate()
    {
        $model = new Regions();
        $request = \Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }
    /**
     * Lists all Regions models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RegionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $regions_tree = Regions::getRegionTreeViewHtmlForm();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'regions_tree' => $regions_tree
        ]);
    }

    /**
     * Displays a single Regions model.
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
     * Creates a new Regions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Regions();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()){
                Yii::$app->session->setFlash('success', Yii::t('app', 'Data Saved!'));
            } else {
                Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Saved!'));
            }
            return $this->redirect(['index']);
        }
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Regions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate(int $id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()){
                Yii::$app->session->setFlash('success', Yii::t('app', 'Data Updated!'));
            } else {
                Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Updated!'));
            }
            return $this->redirect(['index']);
        }
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Regions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete(int $id)
    {
        $model = $this->findModel($id);
        $model->status = Regions::STATUS_DELETED;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * @return bool
     * @throws NotFoundHttpException
     */
    public function actionDeleteAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $id = Yii::$app->request->get('id');
        $model = Regions::find()->where(['parent_id' => $id, 'status' => Regions::STATUS_ACTIVE])->count();
        if (empty($model)) {
            $model = $this->findModel($id);
            $model->status = $model::STATUS_DELETED;
            if ($model->save()){
                Yii::$app->session->setFlash('success', Yii::t('app', 'Data Deleted!'));
                return true;
            } else {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Data Deleted Error!'));
                return false;
            }
        }
        Yii::$app->session->setFlash('success', Yii::t('app', 'Parent are available!'));
        return false;
    }

    /**
     * @param $id
     * @return Regions|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Regions::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
