<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\UserDepartment;
use app\modules\admin\models\UserDepartmentSearch;
use app\controllers\BaseController;
use yii\db\Exception;
use yii\web\NotFoundHttpException;

/**
 * UserDepartmentController implements the CRUD actions for UserDepartment model.
 */
class UserDepartmentController extends BaseController
{
    /**
     * Lists all UserDepartment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserDepartmentSearch();
        $dataProvider = $searchModel->search();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserDepartment model.
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
        throw new NotFoundHttpException(Yii::t('app','Object not found'));
    }

    /**
     * Creates a new UserDepartment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     *
     */
    public function actionCreate()
    {
        $request = Yii::$app->getRequest();
        $model = new UserDepartment();
        if($request->isPost){
            $data = $request->post();

            try {
                $transaction = Yii::$app->db->beginTransaction();
                /** begin save user departments */
                $isAllSaved = $model->userDepartmentSave($data);
                /** end save user departments */

                if ($isAllSaved) {
                    $transaction->commit();
                    Yii::$app->session->setFlash('success', Yii::t('app', 'Data All Saved!'));
                } else {
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('danger', Yii::t('app', 'Data Not Saved!'));
                }
            } catch (Exception $e) {
                Yii::error($e->getMessage(), 'exception');
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
     * Updates an existing UserDepartment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate(int $id)
    {
        $request = Yii::$app->getRequest();
        $model = UserDepartment::findOne(['user_id' => $id]);

        if($request->isPost) {
            $data = $request->post();
            $transaction = Yii::$app->db->beginTransaction();
            try {
                UserDepartment::deleteAll(['user_id' => $data['UserDepartment']['user_id']]);

                /** begin save user departments */
                $isAllSaved = $model->userDepartmentSave($data);
                /** end save user departments */

                if ($isAllSaved) {
                    $transaction->commit();
                    Yii::$app->session->setFlash('success', Yii::t('app', 'Data All Saved!'));
                } else {
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('danger', Yii::t('app', 'Data All Saved!'));

                }
            } catch (Exception $e) {
                Yii::error($e->getMessage(), 'exception');
            }

            return $this->redirect(['index']);
        }

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        } else {
            throw new NotFoundHttpException(Yii::t('app','Object not found'));
        }
    }

    /**
     * Deletes an existing UserDepartment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete(int $id)
    {
        UserDepartment::deleteAll(['user_id' => $id]);
        Yii::$app->session->setFlash('success', Yii::t('app', 'Data All Deleted!'));
        return $this->redirect(['index']);
    }

    /**
     * @param $id
     * @return UserDepartment|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = UserDepartment::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
