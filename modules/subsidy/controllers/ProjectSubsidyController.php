<?php

namespace app\modules\subsidy\controllers;

use app\modules\manuals\models\Contragent;
use Yii;
use app\modules\subsidy\models\ProjectSubsidy;
use app\modules\subsidy\models\ProjectSubsidySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProjectSubsidyController implements the CRUD actions for ProjectSubsidy model.
 */
class ProjectSubsidyController extends Controller
{
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
     * Lists all ProjectSubsidy models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectSubsidySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSubsidy($id)
    {
        $model = $this->findModel($id);
        $contragent = Contragent::findOne($model->contragent_id);
        return $this->render('subsidy', [
            'subsidy' => $model,
            'contragent' => $contragent
        ]);
    }

    public function actionSubsidyUpdate($id)
    {
        $request = Yii::$app->request;
        $post = $request->post();
        $model = $this->findModel($id);
        $contragent = Contragent::findOne($model->contragent_id);

        if ($model->load($post)) {

//            $model->contur_number = $post['ProjectSubsidy']['contur_number'];
            $model->counter_ga = $post['ProjectSubsidy']['counter_ga'];
            $model->plant_all_area_ga = $post['ProjectSubsidy']['plant_all_area_ga'];
            $model->plant_schema_id = $post['ProjectSubsidy']['plant_schema_id'];
            $model->plant_all_count = $post['ProjectSubsidy']['plant_all_count'];
            $model->end_date = $post['ProjectSubsidy']['end_date'];
            $model->job_count = $post['ProjectSubsidy']['job_count'];
            $model->project_all_price = $post['ProjectSubsidy']['project_all_price'];
            vdd($model);

            if ($model->save())
            {
                return $this->render('subsidy', [
                    'subsidy' => $model,
                    'contragent' => $contragent
                ]);
            }
            vdd($model->getErrors());

            return $this->render('subsidy', [
                'subsidy' => $model,
                'contragent' => $contragent
            ]);
        }

        return $this->render('subsidy', [
            'subsidy' => $model,
            'contragent' => $contragent
        ]);
    }
    /**
     * Displays a single ProjectSubsidy model.
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
     * Creates a new ProjectSubsidy model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProjectSubsidy();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProjectSubsidy model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProjectSubsidy model.
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
     * Finds the ProjectSubsidy model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProjectSubsidy the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProjectSubsidy::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
