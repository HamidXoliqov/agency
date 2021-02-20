<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\subsidy\models\ProjectSubsidyWorkSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-subsidy-work-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'project_subsidy_id') ?>

    <?= $form->field($model, 'work_name') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'self_finance_sum') ?>

    <?php // echo $form->field($model, 'subsidy_sum') ?>

    <?php // echo $form->field($model, 'credit_sum') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
