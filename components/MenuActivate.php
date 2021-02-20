<?php


namespace app\components;


use Yii;
use yii\base\Widget;

class MenuActivate extends Widget
{
    public static function modules($m1, $m2=null, $m3=null, $m4=null){

        $module = Yii::$app->controller->module->id;

        if ($module==$m1 || $module==$m2 || $module==$m3 || $module==$m4){
            return "menu-item-open menu-item-active";
        }

    }

    public static function controllers($c1, $c2=null, $c3=null, $c4=null){
        $controller = Yii::$app->controller->id;

        if ($controller==$c1 || $controller==$c2 || $controller==$c3 || $controller==$c4){
            return "menu-item-open menu-item-active";
        }

    }

    public static function actions($a1, $a2=null, $a3=null, $a4=null){

        $action = Yii::$app->controller->id.'/'.Yii::$app->controller->action->id;

        if ($action==$a1 || $action==$a2 || $action==$a3 || $action==$a4){
            return "menu-item-active";
        }

    }

    public static function controllersSlug($slug, $controllerSlug){

        $contrSlug = Yii::$app->controller->id.'/'.$slug;

        if ($controllerSlug == $contrSlug){
            return "menu-item-open menu-item-active";
        }

    }

}