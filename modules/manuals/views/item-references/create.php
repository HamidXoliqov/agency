<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\ItemReferences */
/* @var $father */
$this->title = Yii::t('app', 'Create Item References');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Item References'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
        'father' => $father
    ]) ?>


