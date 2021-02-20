<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\AutoTransport */

$this->title = Yii::t('app', 'Create Auto Transport');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auto transports'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>




    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


