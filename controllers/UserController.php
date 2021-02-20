<?php

namespace app\controllers;

use Yii;
use app\components\MySoliq;
use app\modules\admin\models\UsersSearch;
use app\modules\admin\models\Users;
use app\modules\admin\models\Employee;
use app\modules\manuals\models\Contragent;
use app\modules\manuals\models\MysoliqRegion;
use app\modules\manuals\models\MysoliqDistrict;
use app\modules\manuals\models\ContragentOrgClassification;
use app\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * UserController implements the CRUD actions for Users model.
 */
class UserController extends BaseController
{
/*
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
*/

    public function actionMypage() {
        $user = Yii::$app->user->identity;
        return $this->render('mypage', [
            'user' => $user
        ]);
    }

    public function actionUpdateSelf($id)
    {
        $employee = Employee::find()->where(['id' => $id])->one();
        $department = $employee->department['name_'.Yii::$app->language];
        $user = Users::find()->where(['employee_id' => $id, 'id' => Yii::$app->user->identity->id])->one();
        $data = Yii::$app->request->post();

        if ($employee->load($data) && $user->load($data)) {

            if ($employee->save()){
                if ($data['Users']['password']) {
                    $user->setPassword($data['Users']['password']);
                }
                $user->save();
                Yii::$app->session->setFlash('success', Yii::t('app', 'Data Updated!'));
            } else {
                Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Updated!'));
            }
            return $this->redirect(['mypage']);
        }
        $user->password = '';
        return $this->render('update-self', [
            'department' => $department,
            'employee' => $employee,
            'user' => $user,
        ]);
    }

    public function actionUpdateUserContr(int $id)
    {
        $contragent = Contragent::find()->where(['department_id' => $id])->one();
        $modelys = ContragentOrgClassification::find()->where(['contragent_id' => $contragent->id])->asArray()->all();
        $modely = new ContragentOrgClassification();
        if (!empty($contragent->region_id)) {
            $region = MysoliqRegion::find()->where(['code' => $contragent->region_id])->one();
            $region_name = $region['name_'.Yii::$app->language] ?? '';
        }
        if (!empty($contragent->district_id)) {
            $district = MysoliqDistrict::find()->where(['region_code' => $region->code, 'code' => $contragent->district_id])->asArray()->one();
            $district_name = $district['name_'.Yii::$app->language] ?? '';
        }
        return $this->render('update-user-contr', [
            'modely' => $modely,
            'modelys' => $modelys,
            'model' => $contragent,
            'region_name' => $region_name,
            'district_name' => $district_name,
        ]);
    }

    public function actionDepartment() {
        $user = Yii::$app->user->identity;
        $contragent = Contragent::find()->where(['department_id' => $user->department_id])->one();
        if (!empty($contragent->region_id)) {
            $region = MysoliqRegion::find()->where(['code' => $contragent->region_id])->one();
            $region_name = $region['name_'.Yii::$app->language] ?? '';
        }
        if (!empty($contragent->district_id)) {
            $district = MysoliqDistrict::find()->where(['region_code' => $region->code, 'code' => $contragent->district_id])->asArray()->one();
            $district_name = $district['name_'.Yii::$app->language] ?? '';
        }
        return $this->render('department', [
            'district_name' => $district_name,
            'region_name' => $region_name,
            'contragent' => $contragent,
            'user' => $user,
        ]);
    }

    public function actionAppeals() {
        $user = Yii::$app->user->identity;
        return $this->render('department', [
            'user' => $user
        ]);
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->$this->redirect(['mypage']);
//        $searchModel = new UsersSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
