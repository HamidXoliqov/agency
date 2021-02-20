<?php

namespace app\modules\manuals\controllers;

use app\controllers\BaseController;
use Yii;
use app\modules\manuals\models\ExchangeRate;
use app\modules\manuals\models\ExchangeRateSearch;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * ExchangeRateController implements the CRUD actions for ExchangeRate model.
 */
class ExchangeRateController extends BaseController
{
    public function actionValidate()
    {
        $model = new ExchangeRate();
        $request = \Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }
    /**
     * Lists all ExchangeRate models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExchangeRateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ExchangeRate model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(int $id)
    {
        if (Yii::$app->request->isAjax){
            return $this->renderAjax('view', [
                'model' => $this->findModel($id),
            ]);
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ExchangeRate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ExchangeRate();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()){
                Yii::$app->session->setFlash('success', Yii::t('app', 'Data Saved!'));
            } else {
                Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Saved!'));
            }
            return $this->redirect(['index']);
        }
        if (Yii::$app->request->isAjax){
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ExchangeRate model.
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
                Yii::$app->session->setFlash('success', Yii::t('app', 'Data Update!'));
            } else {
                Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Update!'));
            }
            return $this->redirect(['index']);
        }
        if (Yii::$app->request->isAjax){
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ExchangeRate model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionRemove($id)
    {
        $model = $this->findModel($id);
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->deleteAll($model);
    }

    /**
     * @param $id
     * @return ExchangeRate|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = ExchangeRate::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
