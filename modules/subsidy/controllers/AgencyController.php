<?php

namespace app\modules\subsidy\controllers;

use app\controllers\BaseController;
use app\modules\admin\models\Users;
use app\modules\manuals\models\AppealStatus;
use app\modules\manuals\models\Contragent;
use app\modules\subsidy\models\ProjectSubsidy;
use app\modules\subsidy\models\StatusTimeline;
use app\modules\subsidy\models\StatusTimelineSearch;
use Yii;
use app\modules\subsidy\models\Appeal;
use app\modules\subsidy\models\AppealSearch;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * AppealController implements the CRUD actions for Appeal model.
 */
class AgencyController extends BaseController
{

    /**
     * Lists all Appeal models.
     * @return mixed
     */
    public function actionAppeals()
    {
//        $searchModel = new AppealSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('appeals', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Appeal models.
     * @return mixed
     */
    public function actionAppealsJson()
    {
        $this->layout = false;
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $params = Yii::$app->request->queryParams;
        $page = 1;
        $pages = 0;
        $perpage = 10;
        $total = 0;
        $sort = 'asc';
        $field = 'num';

        if(isset($params['pagination'])) {
            $pagination = $params['pagination']; //page=3, pages=35, perpage=10, total=350
            $sort = $params['sort'];//sort=asc, field=RecordID
            $query = $params['query'];//
            $page = $pagination['page'];
            $pages = $pagination['pages'];
        }


//        $searchModel = new AppealSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//        $dataProvider = $searchModel->searchForAgency();

//        $pgn = $dataProvider->pagination;
//        $meta = [
//            "page" => $pgn->page+1,
//            "pages" => $pgn->pageCount,
//            "perpage" => $pgn->limit,
//            "total" => $dataProvider->totalCount,
//            "sort" => 'asc',
//            "field" => 'num'
//        ];
        $offset = ($page - 1) * $perpage;

        $data = [];
        /* @var $appeals Appeal[] */
//        $appeals = $dataProvider->getModels();
        $query = $appeals = Appeal::find()->where(['>', 'appeal_status', AppealStatus::APPEAL_NEW]);
        $countQuery = clone $query;
        $total = $countQuery->count();
        $appeals = $query->offset($offset)->limit($perpage)->all();
        $pages = floor(($total-1)/$perpage) + 1;
//        die($total.$pages);

        $meta = [
            "page" => $page,
            "pages" => $pages,
            "perpage" => $perpage,
            "total" => $total,
            "sort" => $sort,
            "field" => $field
        ];

//        die($appeals);
        for($i=0; $i<count($appeals); $i++) {
            $appeal = $appeals[$i];
            $contragent = $appeal->contragent;
            $project = $appeal->projectSubsidy;
            $data[$i] = [];
            $data[$i]['num'] = $i+1 + ($meta['page']-1) * $meta['perpage'];
            $data[$i]['appeal_id'] = $appeal->id;
//            $data[$i]['CompanyAgent'] = 'СУЛЕЙМАНОВ ГУЛОМЖОН ЭРКИНОВИЧ';
            $data[$i]['contragent'] = $contragent->name;
//            $data[$i]['status'] = '';
            $data[$i]["appeal_status"] = $appeal->appeal_status;
            $data[$i]["appeal_type"] = $appeal->appeal_type;
//            $data[$i]["region_id"] = $project->region_id;
            $data[$i]["region_id"] = $project->getTheRegion()->id;
            $data[$i]["created_at"] = ''.simpleDate($appeal->created_at ?? $project->created_at);
        }

        $temp = false;
//        $temp = true;
        if($temp) {
//            $page = 1;
            $pages = 35;
//            $perpage = 10;
            $total = 350;
//            $sort = 'asc';
//            $field = 'num';
            $meta = [
                "page" => $page,
                "pages" => $pages,
                "perpage" => $perpage,
                "total" => $total,
                "sort" => $sort,
                "field" => $field
            ];

            for($i=0; $i<10; $i++) {
                $data[$i] = [];
                $data[$i]['num'] = $i+1 + ($page-1) * $perpage;
                $data[$i]['appeal_id'] = 3;
//            $data[$i]['CompanyAgent'] = 'СУЛЕЙМАНОВ ГУЛОМЖОН ЭРКИНОВИЧ';
                $data[$i]['contragent'] = "SAYXUNOBOD TUMANI IRRIGATSIYA BO'LIMI";
//            $data[$i]['status'] = '';
                $data[$i]["appeal_status"] = rand(1, 8);
                $data[$i]["appeal_type"] = rand(1, 1);
                $data[$i]["region_id"] = rand(1, 14);
                $data[$i]["created_at"] = simpleDate(1612777796);
            }
        }

        $response = [
            'meta' => $meta,
            'data' => $data
        ];
        
        return $response;
    }

    public function actionSimpleSendExample($appeal_id=3) {
        header('Content-Type: text/plain');
        $this->layout = false;
//        $appeal_id = 3;
        exit;
        /* @var $user Users*/
        $user = Yii::$app->user->identity;
        $appeal = Appeal::findOne(['id' => $appeal_id]);
        $st = new StatusTimeline();
        $st->appeal_id = $appeal->id;
        $st->status = AppealStatus::APPEAL_SENT_TO_AGENCY;
        $st->comment = "Kontragent arizani agentlikka jo'natdi.";
        $st->type = 1; ///
        $st->action_time = time();
        $st->status_by = $user->id;
        if(!$st->save()) {
            echo arrayToString($st->getErrors());
            exit;
        }
//        $appeal->status = 1;
        $appeal->appeal_status = $st->status;
        $appeal->status_at = $st->action_time;
        $appeal->status_by = $user->id;
        if(!$appeal->save()) {
            echo arrayToString($appeal->getErrors());
            exit;
        }
        echo "Ariza ({$appeal->id}) {$st->status} statusiga o`zgardi.";
    }

    /**
     * Displays a single Appeal model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionAppealView($id)
    {
//        if (Yii::$app->request->isAjax) {
//            return $this->renderAjax('appeal-view', [
//                'appeal' => $this->findModel($id),
//            ]);
//        }
        $statuses = StatusTimeline::find()->where(['appeal_id' => $id])->orderBy(['action_time' => SORT_ASC])->all();
        return $this->render('appeal-view', [
            'appeal' => $this->findModel($id),
            'statuses' => $statuses,
        ]);
    }

    public function actionAppealStatusChange() {
        $this->layout = false;
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $response = ['result' => 0, 'refresh' => 0, 'message' => ''];

        /* @var $user Users*/
        $user = Yii::$app->user->identity;
        if(!$user->isAgency()) {
            return $response;
        }

        $status_change_accepts = [
            AppealStatus::APPEAL_SENT_TO_AGENCY => [
                AppealStatus::APPEAL_AGENCY_ACCEPTED,
//                AppealStatus::APPEAL_REFERRED_TO_COUNCIL,
                AppealStatus::APPEAL_AGENCY_RETURNED,
            ],
            AppealStatus::APPEAL_AGENCY_ACCEPTED => [
//                AppealStatus::APPEAL_REFERRED_TO_COUNCIL,
            ],
            AppealStatus::APPEAL_REFERRED_TO_COUNCIL => [
                AppealStatus::APPEAL_COUNCIL_ACCEPTED,
                AppealStatus::APPEAL_COUNCIL_REFUSED,
            ],
            AppealStatus::APPEAL_COUNCIL_ACCEPTED => [
                AppealStatus::APPEAL_SUBSIDY_WAS_ALLOCATED,
            ],
        ];

        if(Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            $id = $data['appeal-id'];
            $status = $data['status'];
            $comment = $data['comment'];
            $appeal = Appeal::findOne(['id' => $id]);
            if($appeal != null) {
                $response['message'] = '';
                if(isset($status_change_accepts[$appeal->status]) && in_array($status, $status_change_accepts[$appeal->status])) {
                    $transaction = Yii::$app->db->beginTransaction();
                    $appeal->appeal_status = $status;
                    $appeal->status_at = time();
                    $appeal->status_by = $user->id;
                    $timeline = new StatusTimeline();
                    $timeline->appeal_id = $appeal->id;
                    $timeline->status = $status;
                    $timeline->action_time = time();
                    $timeline->comment = $comment;
                    $timeline->type = $appeal->appeal_type;
                    $timeline->status_by = $user->id;
                    $ok = false;
                    if($timeline->save()) {
                        if($appeal->save()) {
                            $ok = true;
                            $response['message'] = Yii::t('app', 'Data Saved!');
                        }
                    }
                    if($ok) {
                        try {
                            $transaction->commit();
                            $response['result'] = 1;
                            $response['refresh'] = 1;
                        } catch (Exception $e) {
                            $transaction->rollBack();
                            $response['error-msg'] = $e->getMessage();
                            $response['message'] = Yii::t('app-msg', 'Server error.');
                        }
                    } else {
                        $response['message'] = Yii::t('app-msg', 'Server error.');
                        $transaction->rollBack();
                    }
                } else {
                    $response['message'] = Yii::t('app-msg', 'Something error.'); //Arizani statusda xatolik.
                    $response['refresh'] = 1;
                }
            } else {
                $response['message'] = 'Ariza topilmadi. ';
            }
        }

        return $response;
    }

    /**
     * Displays a single Appeal model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionAppealViewPrint($id)
    {
//        if (Yii::$app->request->isAjax) {
//            return $this->renderAjax('appeal-view-print', [
//                'appeal' => $this->findModel($id),
//            ]);
//        }

        $statuses = StatusTimeline::find()->where(['appeal_id' => $id])->orderBy(['action_time' => SORT_ASC])->all();
        return $this->render('appeal-view-print', [
            'appeal' => $this->findModel($id),
            'statuses' => $statuses,
        ]);
    }

    /**
     * Displays a single Appeal model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionAppealViewDoc($id)
    {

        $statuses = StatusTimeline::find()->where(['appeal_id' => $id])->orderBy(['action_time' => SORT_ASC])->all();
        return $this->render('appeal-view-doc', [
            'appeal' => $this->findModel($id),
            'statuses' => $statuses,
        ]);
    }

    /**
     * Finds the Appeal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Appeal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Appeal::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * Finds the Appeal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Appeal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelWithUser($id)
    {
//        if (($model = Appeal::find()->where(['id' => $id])->with("updatedBy")->one()) !== null) {
        if (($model = Appeal::find()->where(['id' => $id])->one()) !== null) {
//        if (($model = Appeal::find()->where(['id' => $id])->with("statusBy")->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
