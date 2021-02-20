<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\subsidy\models\ProjectSubsidySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-subsidy-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'appeal_id') ?>

    <?= $form->field($model, 'contragent_id') ?>

    <?= $form->field($model, 'region_id') ?>

    <?= $form->field($model, 'district_id') ?>

    <?php // echo $form->field($model, 'contur_number') ?>

    <?php // echo $form->field($model, 'counter_ga') ?>

    <?php // echo $form->field($model, 'water_pump_count') ?>

    <?php // echo $form->field($model, 'bonitet_ball') ?>

    <?php // echo $form->field($model, 'plant_all_area_ga') ?>

    <?php // echo $form->field($model, 'plant_address') ?>

    <?php // echo $form->field($model, 'plant_schema_id') ?>

    <?php // echo $form->field($model, 'plant_all_count') ?>

    <?php // echo $form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, 'job_count') ?>

    <?php // echo $form->field($model, 'project_all_price') ?>

    <?php // echo $form->field($model, 'project_all_price_currency_id') ?>

    <?php // echo $form->field($model, 'status_project') ?>

    <?php // echo $form->field($model, 'status') ?>

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
