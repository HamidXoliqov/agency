<?php

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\Contragent */

$this->title = Yii::t('app', 'Update Contragent: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contragents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
    <?= $this->render('_form', [
        'model' => $model,
        'modely' => $modely,
        'modelys' => $modelys,
        'region_name' => $region_name,
        'district_name' => $district_name,
    ]) ?>

