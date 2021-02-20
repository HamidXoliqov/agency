<?php

namespace app\modules\manuals\controllers;

use Yii;
use app\modules\manuals\models\ReferencesType;
use app\modules\manuals\models\ReferencesTypeSearch;
use app\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * ReferencesTypeController implements the CRUD actions for ReferencesType model.
 */
class ReferencesTypeController extends BaseController
{
    public function actionValidate()
    {
        $model = new ReferencesType();
        $request = \Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

    /**
     * Lists all ReferencesType models.
     * @return mixed
     */
    public function actionIndex()
    {
         $models = ReferencesType::find()->orderBy('id')->all();

        return $this->render('index', [
             'models' => $models
        ]);
    }

    /**
     * Displays a single ReferencesType model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(int $id)
    {
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('view', [
                'model' => $this->findModel($id),
            ]);
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ReferencesType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate()
//    {
//        $model = new ReferencesType();
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['index', 'id' => $model->id]);
//        }
//        if (Yii::$app->request->isAjax) {
//            return $this->renderAjax('create', [
//                'model' => $model,
//            ]);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
//
//
//    }

    /**
     * Updates an existing Type model.
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
            return $this->redirect(['index', 'id' => $model->id]);
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
     * Deletes an existing Type model.
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

    /**
     * @param $id
     * @return ReferencesType|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = ReferencesType::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
