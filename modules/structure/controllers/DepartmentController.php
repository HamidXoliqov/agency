<?php

namespace app\modules\structure\controllers;

use app\controllers\BaseController;
use app\models\User;
use app\modules\admin\models\Users;
use app\modules\manuals\models\Contragent;
use app\modules\manuals\models\License;
use app\modules\manuals\models\References;
use app\modules\structure\models\DepAddress;
use app\modules\structure\models\DepBankAccount;
use app\modules\structure\models\Vat;
use Yii;
use app\modules\structure\models\Department;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * DepartmentController implements the CRUD actions for Department model.
 */
class DepartmentController extends BaseController
{

    public function actionValidate()
    {
        $model = new Department();
        $request = \Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }
    /**
     * Lists all Department models.
     * @param null $deb
     * @return mixed
     */
    public function actionIndex()
    {
        $userInf = Users::findOne(['id'=>Yii::$app->user->id]);
        $tree = Department::getTreeViewHtmlFormId(null, $userInf['department_id']);
        $contragent = Contragent::find()->where(['department_id' => $userInf['department_id']])->one();
        return $this->render('index', [
            'contragent' => $contragent,
            'tree' => $tree,
        ]);
    }

    /**
     * Displays a single Department model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(int $id)
    {
        return $this->render('views/view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionViewAddress($id)
    {
        return $this->renderAjax('views/view-address', [
            'model' => $this->findModelAddress($id),
        ]);
    }

    /**
     * Creates a new Department model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Department();
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $model->parent_id = Yii::$app->request->post('parent_id');
            $model->status = $model::STATUS_ACTIVE;
            if ($model->save()){
                Yii::$app->session->setFlash('success', Yii::t('app', 'Data Saved!'));
            } else {
                Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Saved!'));
            }
            return $this->redirect(['index']);
        }
        return $this->renderAjax('create', [
            'model' => $model,
            'form' => '_form',
        ]);
    }

    /**
     * Creates a new References model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionReferencesCreate()
    {
        $model = new References();
        $model->references_type_id = Yii::$app->request->get('references_type_id');

        return $this->renderAjax('create', [
            'model' => $model,
            'form' => '_form-references',
        ]);
    }

    public function actionCreateAddress()
    {
        $model = new DepAddress();;
        $data = Yii::$app->request->post();
        if (Yii::$app->request->isPost) {
            $model->load($data);
            $model->department_id = $data['department_id'];
            DepAddress::updateAll(['status' => $model::STATUS_INACTIVE], ['department_id' => $model->department_id]);
            $model->status = $model::STATUS_ACTIVE;
            if ($model->save()){
                Yii::$app->session->setFlash('success', Yii::t('app', 'Data Saved!'));
            } else {
                Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Saved!'));
            }
            return $this->redirect(['index', 'deb' => $model->department_id]);
        }
        return $this->renderAjax('create', [
            'model' => $model,
            'form' => '_form-address',
        ]);
    }

    public function actionCreateBankAccount()
    {
        $model = new DepBankAccount();
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $model->department_id = Yii::$app->request->post('department_id');
            if ($model->save()){
                Yii::$app->session->setFlash('success', Yii::t('app', 'Data Saved!'));
            } else {
                Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Saved!'));
            }
            return $this->redirect(['index', 'deb' => $model->department_id]);
        }
        return $this->renderAjax('create', [
            'model' => $model,
            'form' => '_form-bank-account',
        ]);
    }

    public function actionCreateVat()
    {
        $model = new Vat();
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $model->department_id = Yii::$app->request->post('department_id');
            Vat::updateAll(['status' => $model::STATUS_INACTIVE], ['department_id' => $model->department_id]);
            $model->status = $model::STATUS_ACTIVE;
            if ($model->save()){
                Yii::$app->session->setFlash('success', Yii::t('app', 'Data Saved!'));
            } else {
                Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Saved!'));
            }
            return $this->redirect(['index', 'deb' => $model->department_id]);
        }
        return $this->renderAjax('create', [
            'model' => $model,
            'form' => '_form-vat',
        ]);
    }

    /**
     * Updates an existing Department model.
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
                Yii::$app->session->setFlash('success', Yii::t('app', 'Data Updated!'));
            } else {
                Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Updated!'));
            }
            return $this->redirect(['index', 'deb' => $model->id]);
        }
        return $this->renderAjax('update', [
            'model' => $model,
            'form' => '_form',
        ]);
    }

    public function actionUpdateAddress($id)
    {
        $model = $this->findModelAddress($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()){
                Yii::$app->session->setFlash('success', Yii::t('app', 'Data Updated!'));
            } else {
                Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Updated!'));
            }
            return $this->redirect(['index', 'deb' => $model->department_id]);
        }
        if (Yii::$app->request->isAjax){
            return $this->renderAjax('update', [
                'model' => $model,
                'form' => '_form-address',
            ]);
        }
    }

    public function actionUpdateBankAccount($id)
    {
        $model = $this->findModelBankAccount($id);
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()){
                Yii::$app->session->setFlash('success', Yii::t('app', 'Data Updated!'));
            } else {
                Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Updated!'));
            }
            return $this->redirect(['index', 'deb' => $model->department_id]);
        }
        if (Yii::$app->request->isAjax){
            return $this->renderAjax('update', [
                'model' => $model,
                'form' => '_form-bank-account',
            ]);
        }
    }

    public function actionUpdateVat($id)
    {
        $model = $this->findModelVat($id);
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()){
                Yii::$app->session->setFlash('success', Yii::t('app', 'Data Updated!'));
            } else {
                Yii::$app->session->setFlash('danger', Yii::t('app', 'Error Updated!'));
            }
            return $this->redirect(['index', 'deb' => $model->department_id]);
        }
        if (Yii::$app->request->isAjax){
            return $this->renderAjax('update', [
                'model' => $model,
                'form' => '_form-vat',
            ]);
        }
    }

    /**
     * @param int $id
     * @return Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws yii\db\StaleObjectException
     */
    public function actionDelete(int $id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    /**
     * Finds the Department model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Department the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Department::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function findModelAddress($id)
    {
        if (($model = DepAddress::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function findModelBankAccount($id)
    {
        if (($model = DepBankAccount::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function findModelVat($id)
    {
        if (($model = Vat::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    /**
     * @return bool
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDeleteAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $id = Yii::$app->request->get('id');
        if (!empty($id)){
            $model = $this->findModel($id);
            $model->status = $model::STATUS_DELETED;
            if ($model->save()) return true;
            else return false;
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));

    }

    public function actionGetItemsAjax(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $id = Yii::$app->request->get('id');
        $response = [];
        if (!empty($id)){
            $address = DepAddress::getAddressItems($id);
            $bank = DepBankAccount::getBankAccountItems($id);
            $vat = Vat::getVatItems($id);
            $license = License::getLicenseItems($id);
            $response['address'] = $address;
            $response['bank'] = $bank;
            $response['vat'] = $vat;
            $response['license'] = $license;
            return $response;
        }
        return false;
    }

    public function actionReferencesCreateAjax(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new References();
        $response = [];
        $response['status'] = false;
        $obj = Yii::$app->request->get('obj');
        foreach ($obj as $item) {
            if ($item['name'] != '_csrf') {
                $model[$item['name']] = $item['value'];
            }
        }
        if ($model->save()) {
            $response['status'] = true;
            $response['id'] = $model->id;
            $response['type'] = $model->references_type_id;
            $response['val'] = $model['name_'.Yii::$app->language];
            return $response;
        }
        return $response;
    }

}
