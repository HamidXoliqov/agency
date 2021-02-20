<?php

namespace app\components;

use yii\base\Behavior;
use yii\web\Application;
use Yii;
class SetLanguage extends Behavior
{

    public function events()
    {
        return [
            Application::EVENT_BEFORE_REQUEST => 'func'
        ];
    }
    public function func(){
        if (Yii::$app->session->has('lang')){
            Yii::$app->language =Yii::$app->session->get('lang');
        }
    }
}