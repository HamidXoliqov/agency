<?php

namespace app\modules\manuals\controllers;


use Yii;
use app\modules\manuals\models\References;
use app\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * ReferencesController implements the CRUD actions for References model.
 */
class ReferencesController extends BaseController
{
    /**
     * @return array
     */
    public function actionValidate()
    {
        $model = new References();
        $request = \Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

    /**
     * @return string|Response
     * @throws Yii\db\Exception
     */
    public function actionIndex()
    {
        $model = new References();
        $id = Yii::$app->request->get('id');

        if (empty($id)) {
            return $this->redirect(['references-type/index']);
        }

        $models = $model->getReferencesSelect($id);
        $model = $model->getReferences($id);
        return $this->render('index', [
            'model' => $model,
            'models' => $models,
        ]);
    }

    /**
     * Displays a single References model.
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
     * Creates a new References model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new References();
        $references_type_id = Yii::$app->request->get('references_type_id');

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()){
                Yii::$app->session->setFlash('success', Yii::t('app', 'Data Saved!'));
            } else {
                Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Saved!'));
            }
            return $this->redirect(['index', 'id' => $model->references_type_id]);
        }
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('create', [
                'model' => $model,
                'references_type_id' => $references_type_id
            ]);
        }
        return $this->render('create', [
            'model' => $model,
            'references_type_id' => $references_type_id
        ]);
    }

    /**
     * Updates an existing Directory model.
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
            return $this->redirect(['index', 'id' => $model->references_type_id]);
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
     * Deletes an existing References model.
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
     * @return References|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = References::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
