<?php

use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\ExchangeRate */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Exchange Rates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);

$currency = $model::getCurrencyOneItem($model->currency_id);

$to_currency = $model::getCurrencyOneItem($model->to_currency_id);
?>
    <div class="text-center col-lg-12"><h5><b><?=Yii::t('app', 'From currency')?></b></h5></div><br>
    <div class="separator separator-solid"></div>
    <br>

    <p><?= Yii::t('app', 'Currency: ').$currency['name_'.Yii::$app->language].'/'.$currency['token']?></p>
    <p><?= Yii::t('app', 'Amount: ').$model->amount?></p>


    <div class="text-center col-lg-12"><h5><b><?=Yii::t('app', 'To currency')?></b></h5></div><br>
    <div class="separator separator-solid"></div>
    <br>

    <p><?= Yii::t('app', 'Currency: ').$to_currency['name_'.Yii::$app->language].'/'.$to_currency['token']?></p>
    <p><?= Yii::t('app', 'Amount: ').$model->to_amount?></p>

<?php
$view_address = Yii::t('app', 'View exchange rate');
$js = <<< JS
$(document).ready(function() {
    $('.modal-title').html('{$view_address}');
});
JS;
$this->registerJs($js)
?>