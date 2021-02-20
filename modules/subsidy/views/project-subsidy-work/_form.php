<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\subsidy\models\ProjectSubsidyWork */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-subsidy-work-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_subsidy_id')->textInput() ?>

    <?= $form->field($model, 'work_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'self_finance_sum')->textInput() ?>

    <?= $form->field($model, 'subsidy_sum')->textInput() ?>

    <?= $form->field($model, 'credit_sum')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
