<?php

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\Countries */

$this->title = Yii::t('app', 'Update Countries: {name}', [
    'name' => $model['name_'.Yii::$app->language],
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Countries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->code, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

