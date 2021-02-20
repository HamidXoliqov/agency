<?php

namespace app\modules\warehouse\controllers;

use Yii;
use app\modules\warehouse\models\ItemCategory;
use app\modules\warehouse\models\ItemCategorySearch;
use app\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * ItemCategoryController implements the CRUD actions for ItemCategory model.
 */
class ItemCategoryController extends BaseController
{
    public function actionValidate()
    {
        $model = new ItemCategory();
        $request = \Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

    /**
    /**
     * Lists all ItemCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ItemCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $item_categories_tree = ItemCategory::getItemCategoryTreeViewHtmlForm();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'item_categories_tree' => $item_categories_tree
        ]);
    }

    /**
     * Displays a single ItemCategory model.
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
     * Creates a new ItemCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ItemCategory();

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
     * Updates an existing ItemCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
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
     * Deletes an existing ItemCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
//        $this->findModel($id)->delete();
        $model = $this->findModel($id);
        $model->status = ItemCategory::STATUS_DELETED;
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
        $model = ItemCategory::find()->where(['parent_id' => $id, 'status' => ItemCategory::STATUS_ACTIVE])->count();
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
     * Finds the ItemCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ItemCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ItemCategory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
