<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\AppealType */

$this->title = Yii::t('app', 'Update Appeal Type: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appeal Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
