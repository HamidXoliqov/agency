<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\ReferencesType */

$this->title = Yii::t('app', 'Update : {lang}', [
//    'name' => $model->id,
    'lang' => $model['name_'.Yii::$app->language],
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'References Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

