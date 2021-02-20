<?php

namespace app\modules\project\controllers;

use app\models\UploadForm;
use app\modules\manuals\models\References;
use app\modules\project\models\Project1321Point;
use app\modules\project\models\Project2226Point;
use app\modules\project\models\Project2Point;
use app\modules\project\models\Project3Point;
use app\modules\project\models\Project811Point;
use app\modules\project\models\ProjectAttachment;
use Yii;
use app\modules\project\models\Project;
use app\modules\project\models\ProjectSearch;
use app\controllers\BaseController;
use yii\db\Exception;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends BaseController
{
    /**
     * Lists all Project models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Project model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $model = $this->findModel($id);
        $model->cp = [
            '2' => Project2Point::findAll(['project_id' => $id]),
            '3' => Project3Point::findAll(['project_id' => $id]),
            '8-11' => Project811Point::findAll(['project_id' => $id]),
            '13-21' => Project1321Point::findAll(['project_id' => $id]),
            '22-26' => Project2226Point::findAll(['project_id' => $id]),
            'file' => Project::findOne($id)->getProjectAttachment()->joinWith("attachment")->asArray()->all(),
        ];


        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Project();
        $currencyList = References::find()
            ->joinWith('referencesType')
            ->where(['references_type.token' => Project::TOKEN_REFERENCE_CURRENCY])
            ->asArray()
            ->orderBy(['sort' => SORT_ASC])
            ->all();
        $model->cp['currencyList'] = ArrayHelper::map($currencyList,'id',"name_{$this->lang}");
        if ($model->load(Yii::$app->request->post())) {
            $flag = true;
            $transaction = Yii::$app->db->beginTransaction();
            try {
                if ($model->save()) {
                    $attachs = explode(",", $model->project_attachment);
                    foreach ($attachs as $attach) {
                        if (empty($attach)) {
                            continue;
                        }
                        $projectAttachmentModel = new ProjectAttachment([
                            'project_id' => $model->id,
                            'attachment_id' => $attach,
                        ]);
                        if ($projectAttachmentModel->save() == false){
                            $flag = false;
                            break;
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            } catch (\Exception $e) {
                $transaction->rollBack();
                throw new Exception($e);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $currencyList = References::find()
            ->joinWith('referencesType')
            ->where(['references_type.token' => Project::TOKEN_REFERENCE_CURRENCY])
            ->asArray()
            ->orderBy(['sort' => SORT_ASC])
            ->all();
        $model->project_attachment = $model->getProjectAttachment()->joinWith("attachment")->asArray()->all();
        $model->cp['project_attachment'] = ArrayHelper::getColumn($model->project_attachment, 'attachment_id');
        $model->cp['currencyList'] = ArrayHelper::map($currencyList,'id',"name_{$this->lang}");
        if ($model->load(Yii::$app->request->post())) {

            $flag = true;
            $transaction = Yii::$app->db->beginTransaction();
            try {
                if ($model->save()) {
                    ProjectAttachment::deleteAll(['project_id' => $model->id]);
                    $attachs = explode(",", (string)$model->project_attachment);
                    foreach ($attachs as $attach) {
                        if (empty($attach)) {
                            continue;
                        }
                        $projectAttachmentModel = new ProjectAttachment([
                            'project_id' => $model->id,
                            'attachment_id' => $attach,
                        ]);
                        if ($projectAttachmentModel->save() == false){
                            $flag = false;
                            break;
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            } catch (\Exception $e) {
                $transaction->rollBack();
                throw new Exception($e);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionUploadAttachment()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new UploadForm([
            'uploadPath' => "uploads/project/",
        ]);
        $response = [];
        $response['status'] = 0;
        $response['message'] = Yii::t('app', 'Error');
        if(Yii::$app->request->isPost){
            $file = UploadedFile::getInstancesByName('file');
            $model->file = is_array($file) ? $file[0] : $file;
            if($img = $model->uploadAjax()){
                $response['status'] = 1;
                $response['message'] = Yii::t('app', 'Saved Successfully');
                $response['file'] = $img;
            }
        }
        return $response;
    }

    public function actionItemsView($project_id)
    {


        $cp = [
            '2' => Project2Point::findAll(['project_id' => $project_id]),
            '3' => Project3Point::findAll(['project_id' => $project_id]),
            '8-11' => Project811Point::findAll(['project_id' => $project_id]),
            '13-21' => Project1321Point::findAll(['project_id' => $project_id]),
            '22-26' => Project2226Point::findAll(['project_id' => $project_id]),
            'file' => Project::findOne($project_id)->getProjectAttachment()->joinWith("attachment")->asArray()->all(),
        ];
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('items-view', [
                'cp' => $cp
            ]);
        }
        return $this->render('items-view', [
            'cp' => $cp
        ]);
    }

    /**
     * Deletes an existing Project model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
