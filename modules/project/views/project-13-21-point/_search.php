<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\project\models\Project1321PointSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project1321-point-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'assimilation_forecast_year') ?>

    <?= $form->field($model, 'assimilation_forecast') ?>

    <?= $form->field($model, 'mastered_fact') ?>

    <?= $form->field($model, 'cmr') ?>

    <?php // echo $form->field($model, 'equipment') ?>

    <?php // echo $form->field($model, 'import') ?>

    <?php // echo $form->field($model, 'other') ?>

    <?php // echo $form->field($model, 'predict_period') ?>

    <?php // echo $form->field($model, 'forecast_year') ?>

    <?php // echo $form->field($model, 'project_id') ?>

    <?php // echo $form->field($model, 'order_number') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
