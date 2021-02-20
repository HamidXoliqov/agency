<?php

namespace app\modules\admin\controllers;

use app\controllers\BaseController;
use app\modules\admin\models\AuthAssignment;
use app\modules\admin\models\AuthItemChild;
use Yii;
use app\modules\admin\models\AuthItem;
use app\modules\admin\models\AuthItemSearch;
use yii\db\Exception;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * AuthItemController implements the CRUD actions for AuthItem model.
 */
class AuthItemController extends BaseController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AuthItemSearch();
        $dataProvider = $searchModel->search();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionEdit(){


    }
    /**
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthItem();
        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['update', 'id' => $model->name]);
            } else {
                return $this->redirect(['index']);
            }
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate(string $id)
    {
        $model = $this->findModel($id);


        $child = AuthItemChild::find()->where(['parent' => $model->name])->asArray()->all();
        $all_children = [0 => ''];
        if (!empty($all_children)) {
            foreach ($child as $item) {
                array_push($all_children, $item['child']);
            }
        }


        $view = AuthItem::getAuthItemUniversal($all_children);
        if (!Yii::$app->request->post('AuthItem') && Yii::$app->request->post('role_name')) {
            AuthItemChild::deleteAll(['parent' => Yii::$app->request->post('role_name')]);
            return $this->redirect(['index']);
        }

        if ($model->load(Yii::$app->request->post())) {
            $parent = Yii::$app->request->post('role_name');
            $children = Yii::$app->request->post('AuthItem');

            if (!empty($parent)) {
                AuthItemChild::deleteAll(['parent' => $parent]);
                try {
                    $transaction = Yii::$app->db->beginTransaction();
                    $saved = false;
                    foreach ($children as $child) {
                        $auth_item_child = new AuthItemChild();
                        $auth_item_child->setAttributes([
                           'parent' => $parent,
                           'child' => $child,
                        ]);
                        if ($auth_item_child->save()) {
                            $saved = true;
                        } else {
                            $saved = false;
                            break;
                        }
                    }
                    if ($saved) {
                        $transaction->commit();
                        Yii::$app->session->setFlash('success', Yii::t('app', 'Data All Saved!'));
                    } else {
                        $transaction->rollBack();
                        Yii::$app->session->setFlash('danger', Yii::t('app', 'Data Not Saved!'));
                    }
                } catch (Exception $e) {
                    Yii::info('Error Document' .$e->getMassage(), 'save');
                }
            }
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'view' => $view,
            'all_children' => $all_children
        ]);
    }


    /**
     * @param $id
     * @return mixed
     * @throws \Throwable
     * @throws yii\db\StaleObjectException
     */
    public function actionRemove($id)
    {
        $model = AuthItem::findOne($id);
        Yii::$app->response->format = Response::FORMAT_JSON;
        $response['status'] = 'false';
        $response['error'] = Yii::t('app', 'Deleted Error!');
        $response['saved'] = Yii::t('app', 'Rule Deleted!');
        if (!empty($model)) {
            AuthItemChild::deleteAll(['parent' => $id]);
            if ($model->delete()) {
                AuthAssignment::deleteAll(['user_id' => $id]);
                $response['status'] = 'true';
            }
        }
        return $response;
    }


    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(string $id)
    {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
