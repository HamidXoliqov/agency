<?php


/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\ExchangeRate */

$this->title = Yii::t('app', 'Update Exchange Rate', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Exchange Rates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


