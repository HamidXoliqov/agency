<?php

namespace app\modules\manuals\controllers;

use Yii;
use app\modules\manuals\models\License;
use app\modules\manuals\models\LicenseSearch;
use app\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * LicenseController implements the CRUD actions for License model.
 */
class LicenseController extends BaseController
{

    /**
     * Lists all License models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new LicenseSearch();
        $dataProvider = $searchModel->search();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single License model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(int $id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new License model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new License();
        $data = Yii::$app->request->post();
        if ($model->load($data)) {
            $model->order_date = date('Y-m-d', strtotime($model->order_date));
            $model->given_date = date('Y-m-d', strtotime($model->given_date));
            $model->expiration_date = date('Y-m-d', strtotime($model->expiration_date));
            if ($model->save()){
                Yii::$app->session->setFlash('success', Yii::t('app', 'Data Saved!'));
            } else {
                Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Saved!'));
            }
            return $this->redirect(['index']);

        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * @param $dep
     * @return string|yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionCreateDepartment($dep)
    {
        $model = new License();
        if (!empty($dep)) {
            $model->department_id = $dep;
            if ($model->load(Yii::$app->request->post())) {
                $model->order_date = date('Y-m-d', strtotime($model->order_date));
                $model->given_date = date('Y-m-d', strtotime($model->given_date));
                $model->expiration_date = date('Y-m-d', strtotime($model->expiration_date));
                if ($model->save()){
                    Yii::$app->session->setFlash('success', Yii::t('app', 'Data Updated!'));
                } else {
                    Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Updated!'));
                }
                return $this->redirect(['../structure/department']);
            }

            return $this->render('create', [
                'model' => $model,
                'id' => $dep,
            ]);
        }
        throw new NotFoundHttpException(Yii::t('app', 'You can not enter to department because you have not department_id'));
    }


    /**
     * Updates an existing License model.
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
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * @param $dep
     * @param $id
     * @return string|yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdateDepartment($dep, $id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()){
                Yii::$app->session->setFlash('success', Yii::t('app', 'Data Update!'));
            } else {
                Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Update!'));
            }
            return $this->redirect(['../structure/department']);
        }
        return $this->render('update', [
            'model' => $model,
            'dep' => $dep,
        ]);
    }

    /**
     * Deletes an existing License model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete(int $id)
    {
        $model = $this->findModel($id);
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->deleteAll($model);
    }

    public function actionDeleteDepartment($dep, $id)
    {
        if ($this->findModel($id)->delete()) {
            return true;
        }
        return false;
    }

    /**
     * @param $id
     * @return License|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = License::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
