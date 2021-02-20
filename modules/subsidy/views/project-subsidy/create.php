<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\subsidy\models\ProjectSubsidy */

$this->title = Yii::t('app', 'Create Project Subsidy');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Project Subsidies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-subsidy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
