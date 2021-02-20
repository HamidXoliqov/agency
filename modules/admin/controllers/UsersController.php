<?php

namespace app\modules\admin\controllers;

use app\controllers\BaseController;
use app\modules\admin\models\AuthAssignment;
use app\modules\admin\models\UserDepartment;
use Yii;
use app\modules\admin\models\Users;
use app\modules\admin\models\UsersSearch;
use yii\db\Exception;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends BaseController
{
    public function actionValidate()
    {
        $model = new Users();
        $request = \Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(); /* inside search was Yii::$app->request->queryParams */
        $userDepartment = new UserDepartment();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'userDepartment' => $userDepartment
        ]);
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(int $id)
    {
        $userDepartment = new UserDepartment();

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('view', [
                'model' => $this->findModel($id),
                'userDepartment' => $userDepartment
            ]);
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'userDepartment' => $userDepartment
        ]);

    }

    /**
     * Creates a new Users model.
     * If creation is successful,
     * the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();
        $model->setScenario(Users::SCENARIO_CREATE);
        $models = new AuthAssignment();
        $userDepartment = new UserDepartment();
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->load($post)) {
                try {
                    $transaction = Yii::$app->db->beginTransaction();
                    $saved = false;
                    $model->setPassword($model->password);
                    if ($model->save()) {
                        $saved = true;
                        $userDepartment->userDepartmentSave($post, $model->id);
                        if (!empty($post['Users']['item_name'])) {
                            foreach ($post['Users']['item_name'] as $items) {
                                $add = new AuthAssignment();
                                $add->setAttributes([
                                    'item_name' => $items,
                                    'user_id' => $model->id
                                ]);
                                if ($add->save()) {
                                    $saved = true;
                                } else {
                                    $saved = false;
                                    break;
                                }
                            }
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
                    Yii::info('Not saved' . $e, 'save');
                }
                return $this->redirect('index');
            }
        }
        $model->password = '';
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('create', [
                'model' => $model,
                'models' => $models,
                'userDepartment' => $userDepartment
            ]);
        }
        return $this->render('create', [
            'model' => $model,
            'models' => $models,
            'userDepartment' => $userDepartment
        ]);
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate(int $id)
    {
        $model = $this->findModel($id);

        /** begin foydalanuvchining oldingi departmentlarini olish uchun */
        $userDepartment = new UserDepartment();
        $userDepartment->department_receiving = UserDepartment::find()
            ->select('department_id')
            ->andWhere(['user_id' => $model->id, 'is_transfer' => UserDepartment::DEPARTMENT_RECEIVING])
            ->column();
        $userDepartment->department_outputting = UserDepartment::find()
            ->select('department_id')
            ->andWhere(['user_id' => $model->id, 'is_transfer' => UserDepartment::DEPARTMENT_OUTPUTTING])
            ->column();
        /** end */

        $model->setScenario(Users::SCENARIO_UPDATE);
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->load($post)) {

                try {
                    $transaction = Yii::$app->db->beginTransaction();
                    $saved = false;
                    $model->setPassword($model->password);
                    if ($model->save()) {
                        UserDepartment::deleteAll(['user_id' => $model->id]);
                        $saved = $userDepartment->userDepartmentSave($post, $model->id);
                        if (!empty($post['Users']['item_name'])) {
                            AuthAssignment::deleteAll(['user_id' => $model->id]);
                            foreach ($post['Users']['item_name'] as $items) {
                                $add = new AuthAssignment();
                                $add->setAttributes([
                                    'item_name' => $items,
                                    'user_id' => $model->id
                                ]);
                                if ($saved && $add->save()) {
                                    $saved = true;
                                } else {
                                    $saved = false;
                                    break;
                                }
                            }
                        }
                    }
                    if ($saved) {
                        $transaction->commit();
                        Yii::$app->session->setFlash('success', Yii::t('app', 'Data All Saved!'));
                    } else {
                        $transaction->rollBack();
                        Yii::$app->session->setFlash('danger', Yii::t('app', 'Data Not Saved!'));
                    }
                } catch (\Exception $e) {
                    Yii::info('Not saved' . $e, 'save');
                }
                return $this->redirect('index');
            }
        }

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('update', [
                'model' => $model,
                'userDepartment' => $userDepartment
            ]);
        }
        return $this->render('update', [
            'model' => $model,
            'userDepartment' => $userDepartment
        ]);
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete(int $id)
    {
        $model = $this->findModel($id);
        $model->status = $model::STATUS_DELETED;
        if ($model->save()) {
            UserDepartment::deleteAll(['user_id' => $id]);
            Yii::$app->session->setFlash('success', Yii::t('app', 'User Deleted!'));
        } else {
            Yii::$app->session->setFlash('danger', Yii::t('app', 'User Delete Error!'));
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    /**
     * @return array
     */
    public function actionEmail()
    {

        Yii::$app->response->format = Response::FORMAT_JSON;
        $response = [];
        $response['status'] = false;
        $id = Yii::$app->request->get('id');
        $email = Yii::$app->request->get('email');
        if ($id) {
            $users = Users::find()
                ->where(['email' => $email])
                ->andWhere(['not in', 'id', $id])
                ->all();
        } else {
            $users = Users::find()
                ->where(['email' => $email])
                ->all();
        }
        if (!empty($users) && !empty($email)) {
            $response['status'] = true;
            $response['message'] = 'OK';
        } else {
            $response['message'] = 'Empty';
            $response['data'] = Yii::$app->request->get();
        }
        return $response;
    }

    /**
     * @return array
     */
    public function actionCheackUsername($username , $id = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $response = [];
        $response['status'] = false;
        if (!empty($username)) {
            if ($id) {
                $users = Users::find()
                    ->where(['username' => $username])
                    ->andWhere(['not in', 'id', $id])
                    ->all();
            } else {
                $users = Users::find()
                    ->where(['username' => $username])
                    ->all();
            }
            if (empty($users)) {
                $response['status'] = true;
            }
        }
        return $response;
    }

}
