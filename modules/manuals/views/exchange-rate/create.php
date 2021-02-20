<?php

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\ExchangeRate */

$this->title = Yii::t('app', 'Create Exchange Rate');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Exchange Rates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

