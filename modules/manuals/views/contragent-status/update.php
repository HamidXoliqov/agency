<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\AppealStatus */

$this->title = Yii::t('app', 'Update Appeal Status: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appeal Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
