<?php

namespace app\modules\manuals\controllers;

use Yii;
use app\modules\manuals\models\ItemReferences;
use app\modules\manuals\models\ItemReferencesSearch;
use app\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * ItemReferencesController implements the CRUD actions for ItemReferences model.
 */
class ItemReferencesController extends BaseController
{

    /**
     * Lists all ItemReferences models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ItemReferencesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ItemReferences model.
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
     * Creates a new ItemReferences model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ItemReferences();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('create', [
                'model' => $model,
                'father' => '',
            ]);
        }
    }

    /**
     * Updates an existing ItemReferences model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('update', [
                'model' => $model,
                'father' => '',
            ]);
        }
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @param $id
     * @return ItemReferences|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = ItemReferences::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionItemReferencesIndex()
    {
        $id = Yii::$app->request->get('id');
        if (is_numeric($id)) {
            $model = (new ItemReferences)->getParentItem($id);
            return $this->render('item_references', [
                'model' => $model,
                'father' => $id,
            ]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionItemReferencesCreate()
    {
        $id = Yii::$app->request->get('id');
        $model = new ItemReferences();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $parent_id = $model->parent_id;
            return $this->redirect(['item-references-index',
                'id' => $parent_id,
            ]);
        }

        if (is_numeric($id)) {
            if (Yii::$app->request->isAjax) {
                return $this->renderAjax('create', [
                    'model' => $model,
                    'father' => $id
                ]);
            }
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * @param $id
     * @param $father
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionItemReferencesUpdate($id)
    {
        $father = Yii::$app->request->get('father');
        $model = $this->findModel($id);
        if (is_numeric($father)) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $parent_id = $model->parent_id;
                return $this->redirect(['item-references-index',
                    'id' => $parent_id,
                ]);
            }
            if (Yii::$app->request->isAjax) {
                return $this->renderAjax('update', [
                    'model' => $model,
                    'father' => $father
                ]);
            }
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    public function actionCheckUsername($token , $id = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $response = [];
        $response['status'] = false;
        if (!empty($token)) {
            if ($id) {
                $users = ItemReferences::find()
                    ->where(['token' => $token])
                    ->andWhere(['not in', 'id', $id])
                    ->all();
            } else {
                $users = ItemReferences::find()
                    ->where(['token' => $token])
                    ->all();
            }
            if (empty($users)) {
                $response['status'] = true;
            }
        }
        return $response;
    }
}
