<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\project\models\Project1321Point */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'assimilation_forecast_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assimilation_forecast')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mastered_fact')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cmr')->textInput() ?>

    <?= $form->field($model, 'equipment')->textInput() ?>

    <?= $form->field($model, 'import')->textInput() ?>

    <?= $form->field($model, 'other')->textInput() ?>

    <?= $form->field($model, 'predict_period')->textInput() ?>

    <?= $form->field($model, 'forecast_year')->textInput() ?>
    <?= $form->field($model, 'project_id')->hiddenInput(['value' => $project_id])->label(false) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
