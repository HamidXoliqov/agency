<?php

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\Bank */

$this->title = Yii::t('app', 'Update Bank: {name}', [
    'name' => $model['name_' . Yii::$app->language],
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Banks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<br>

<?= $this->render('_form', [
    'model' => $model,
]) ?>