<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\project\models\Project2226Point */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'forecast_attracting_finance')->textInput() ?>

    <?= $form->field($model, 'involved_fact')->textInput() ?>

    <?= $form->field($model, 'forecast_period')->textInput() ?>

    <?= $form->field($model, 'forecast_year')->textInput() ?>
    <?= $form->field($model, 'project_id')->hiddenInput(['value' => $project_id])->label(false) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
