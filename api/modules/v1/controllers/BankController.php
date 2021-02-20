<?php

namespace app\api\modules\v1\controllers;

use app\modules\manuals\models\Bank;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use app\models\Constants;
use yii\httpclient\Client;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use app\modules\base\models\Goods;
use yii\filters\ContentNegotiator;
use app\modules\tikuv\models\TikuvGoodsDocAccepted;
use app\api\modules\v1\components\CorsCustom;
use app\modules\tikuv\models\TikuvGoodsDocPack;

/**
 * Country Controller API
 *
 * @author Omadbek Onorov <omadbek.onorov@gmail.com>
 */
class BankController extends ActiveController
{
    public $modelClass = 'app\modules\manuals\models\Bank';

    public $enableCsrfValidation = false;

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        unset($actions['update']);
        unset($actions['index']);
        unset($actions['view']);
        return $actions;
    }

    public function behaviors()
    {
        return [
            'corsFilter' => [
                'class' => CorsCustom::className()
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'test' => ['GET', 'POST', 'HEAD', 'OPTIONS'],
                ],
            ],
            [
                'class' => ContentNegotiator::className(),
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
        ];
    }

    /**
     * @param $getData
     * @return array
     */
    public function conditions($getData)
    {

        $conditions = [];
        $conditions['page'] = 1;
        $conditions['limit'] = 10;
        $conditions['lang'] = 'uz';
        $conditions['sort'] = 'DESC';
        if (!empty($getData)) {
            if (!empty($getData['limit'])) {
                $conditions['limit'] = $getData['limit'];
            }
            if (!empty($getData['page'])) {
                $conditions['page'] = $getData['page'];
            }
            if (!empty($getData['lang'])) {
                $conditions['lang'] = $getData['lang'];
            }
            if (!empty($getData['sort'])) {
                $conditions['sort'] = $getData['sort'];
            }
        }
        return $conditions;
    }


    public function actionTest()
    {
        $data = Yii::$app->request->get();
        $response['status'] = true;
        $response['total'] = 0;
        $banks = Bank::find()->asArray()->all();
        $response['data'] = $banks;
        $response['getParams'] = $data;
        return $response;
    }
}
