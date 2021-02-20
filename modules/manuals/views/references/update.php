<?php

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\References */

$this->title = Yii::t('app', 'Update: {name}', [
    $til = "name_".Yii::$app->language,
    'name' => $model->$til,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'References'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
