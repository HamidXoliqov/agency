<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\project\models\Project811Point */

$this->title = Yii::t('app', 'Create Project811 Point');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Project811 Points'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
