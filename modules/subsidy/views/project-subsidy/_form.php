<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\subsidy\models\ProjectSubsidy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-subsidy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'appeal_id')->textInput() ?>

    <?= $form->field($model, 'contragent_id')->textInput() ?>

    <?= $form->field($model, 'region_id')->textInput() ?>

    <?= $form->field($model, 'district_id')->textInput() ?>

    <?= $form->field($model, 'contur_number')->textInput() ?>

    <?= $form->field($model, 'counter_ga')->textInput() ?>

    <?= $form->field($model, 'water_pump_count')->textInput() ?>

    <?= $form->field($model, 'bonitet_ball')->textInput() ?>

    <?= $form->field($model, 'plant_all_area_ga')->textInput() ?>

    <?= $form->field($model, 'plant_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plant_schema_id')->textInput() ?>

    <?= $form->field($model, 'plant_all_count')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>

    <?= $form->field($model, 'job_count')->textInput() ?>

    <?= $form->field($model, 'project_all_price')->textInput() ?>

    <?= $form->field($model, 'project_all_price_currency_id')->textInput() ?>

    <?= $form->field($model, 'status_project')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
