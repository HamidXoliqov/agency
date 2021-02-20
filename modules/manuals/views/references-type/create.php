<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\ReferencesType */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'References Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


