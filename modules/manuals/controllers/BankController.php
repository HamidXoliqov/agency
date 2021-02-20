<?php

namespace app\modules\manuals\controllers;

use app\controllers\BaseController;
use Yii;
use app\modules\manuals\models\Bank;
use app\modules\manuals\models\BankSearch;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * BankController implements the CRUD actions for Bank model.
 */
class BankController extends BaseController
{


    /**
     * Lists all Bank models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BankSearch();
        $dataProvider = $searchModel->search();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bank model.
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


    public function actionValidate()
    {
        $model = new Bank();
        $request = \Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

    /**
     * Creates a new Bank model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bank();
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
     * @param $id
     * @return string|Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
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
    /**
     * @param $id
     * @return Bank|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Bank::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
