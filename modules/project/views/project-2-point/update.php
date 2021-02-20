<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\project\models\Project2Point */

$this->title = Yii::t('app', 'Update Project2 Point: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Project2 Points'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <div class="card-title"><?= Html::encode($this->title) ?></div>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'project_id' => $project_id,
    ]) ?>

</div>
