<?php

namespace app\controllers;

use app\models\BaseModel;
use app\models\SystemStructura;
use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\components\PermissionHelper as P;

/**
 * Class BaseController
 * @package app\controllers
 */
class BaseController extends Controller
{
    public $info;
    public $lang = 'uz';

    public function __construct($id, $module, $config = [])
    {
        $this->info = SystemStructura::find()->asArray()->orderBy(['id' => SORT_DESC])->limit(1)->one();
        parent::__construct($id, $module, $config);
        return $this->info;
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login','auth', 'esi', 'register-user', 'via-esi', 'error', 'test-soliq', 'soliq-data-example'],
                        'allow' => true,
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function deleteAll($model){
        $response['status'] = 'false';
        $response['error'] = Yii::t('app', 'Deleted Error!');
        $response['saved'] = Yii::t('app', 'Data Deleted!');
        $model->status = BaseModel::STATUS_DELETED;
        if ($model->save()) {
            $response['status'] = 'true';
        }
        return $response;
    }

    /**
     * @param $action
     * @return bool
     * @throws ForbiddenHttpException
     * @throws Yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        $this->lang = Yii::$app->language;
//        if (Yii::$app->authManager->getPermission(Yii::$app->controller->id . "/" . Yii::$app->controller->action->id)) {
//            if (!P::can(Yii::$app->controller->id . "/" . Yii::$app->controller->action->id)) {
//                throw new ForbiddenHttpException(Yii::t('app', 'Access denied'));
//            }
//        }
        return parent::beforeAction($action);
    }

    /**
     * @param $lang
     * @return yii\web\Response
     */
    public function actionSelectLang($lang)
    {
        Yii::$app->session->set('lang',$lang);
        Yii::$app->language = $lang;
        return $this->redirect(Yii::$app->request->referrer);
    }
}
