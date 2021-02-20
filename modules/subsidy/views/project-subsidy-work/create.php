<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\subsidy\models\ProjectSubsidyWork */

$this->title = Yii::t('app', 'Create Project Subsidy Work');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Project Subsidy Works'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-subsidy-work-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
