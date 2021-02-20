<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\BaseModel;
use app\components\MySoliq;
use app\controllers\BaseController;
use app\modules\admin\models\Employee;
use app\modules\admin\models\AuthAssignment;
use app\modules\admin\models\Users;
use app\modules\admin\models\SearchEmployee;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * EmployeeController implements the CRUD actions for Employee model.
 */
class EmployeeController extends BaseController
{
    public $info;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Employee models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchEmployee();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Employee model.
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
     * Creates a new Employee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Employee();
        $user = new Users();
        $roles = new AuthAssignment();
        if ($model->load($data = Yii::$app->request->post())) {
            try {
                $transaction = Yii::$app->db->beginTransaction();
                $saved = false;
                $model->status = BaseModel::STATUS_ACTIVE;
                $test = Employee::find()->where(['tin' => $data['Employee']['tin'], 'status' => BaseModel::STATUS_ACTIVE])->one();
                $model->department_id = $data['department_id'];
                if (empty($test) && $model->save()){
                    $saved = true;
                    if (!empty($data['Users']['username'])) {
                        $user->setAttributes([
                            'fullname' => $data['Users']['fullname'],
                            'username' => $data['Users']['username'],
                            'password' => $user->setPasswordReturn($data['Users']['password']),
                            'email' => $data['Users']['email'],
                            'status' => BaseModel::STATUS_ACTIVE,
                            'address' => $data['Users']['address'],
                            'department_id' => $data['department_id'],
                            'employee_id' => $model->id
                        ]);
                        if ($user->save()) {
                            foreach ($data['Users']['item_name'] as $items) {
                                $add = new AuthAssignment();
                                $add->setAttributes([
                                    'item_name' => $items,
                                    'user_id' => $user->id
                                ]);
                                if ($add->save()) {
                                    $saved = true;
                                } else {
                                    $saved = false;
                                    break;
                                }
                            }
                        }else{
                            $saved = false;
                        }
                    }
                }  
                if ($saved == true) {
                    $transaction->commit();
                    Yii::$app->session->setFlash('success', Yii::t('app', 'Data All Saved!'));
                } else {
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('danger', Yii::t('app', 'Data Not Saved!'));
                    echo "<pre>"; print_r($user->getErrors());die;
                    Yii::error(json_encode($user->getErrors()));
                }
            } catch (Exception $e) {
                Yii::info('Not saved' . $e, 'save');
            }
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    /**
     * Updates an existing Employee model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user = Users::find()->where(['employee_id' => $id])->one();

        if ($model->load($data = Yii::$app->request->post())) {
            try {
                $transaction = Yii::$app->db->beginTransaction();
                $saved = false;
                $model->department_id = $data['department_id'];
                if ($model->save()){
                    $saved = true;
                    if (!empty($data['Users']['username'])) {
                        $user->fullname = $data['Users']['fullname'];
                        $user->username = $data['Users']['username'];
                        $user->address = $data['Users']['address'];
                        $user->email = $data['Users']['email'];
                        if ($user->save()) {
                            AuthAssignment::deleteAll(['user_id' => $user->id]);
                            foreach ($data['Users']['item_name'] as $items) {
                                $add = new AuthAssignment();
                                $add->setAttributes([
                                    'item_name' => $items,
                                    'user_id' => $user->id
                                ]);
                                if ($saved && $add->save()) {
                                    $saved = true;
                                } else {
                                    $saved = false;
                                    break;
                                }
                            }
                        }else{
                            $saved = false;
                        }
                    }
                }
                if ($saved == true) {
                    $transaction->commit();
                    Yii::$app->session->setFlash('success', Yii::t('app', 'Data All Saved!'));
                } else {
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('danger', Yii::t('app', 'Data Not Saved!'));
                    echo "<pre>"; print_r($user->getErrors());die;
                    Yii::error(json_encode($user->getErrors()));
                }
            } catch (Exception $e) {
                Yii::info('Not saved' . $e, 'save');
            }
            return $this->redirect(['index']);
        }
        if (Yii::$app->request->isAjax){
            return $this->renderAjax('update', [
                'model' => $model,
                'user' => $user,
            ]);
        }
        return $this->render('update', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    public function actionSearchByTin()
    {
        if (Yii::$app->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            $mysoliq = new MySoliq();
            $tin = Yii::$app->request->post('inn');
            $data = json_decode($mysoliq->fiz($tin), true);
            if (!empty($data['tin'])) {
                $response = ['status'=>'success','data'=>$data, 'dutyClass' => (($data['duty'] == true) ? 'bg-danger' : 'bg-success'), 'duty' => (($data['duty'] == true) ? Yii::t('app', 'Debtor') : Yii::t('app', 'Not In Debt'))];
            } else {
                $response = ['status'=>'fail', 'errorMsg'=>Yii::t('app', 'Error with Tin')];
            }
            return $response;
        }
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
     * Finds the Employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employee::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
