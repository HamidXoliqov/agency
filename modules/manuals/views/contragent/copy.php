<?php

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\Contragent */

$this->title = Yii::t('app', 'Copy Contragent: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contragents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Copy');
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>

