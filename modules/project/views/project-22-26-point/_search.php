<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\project\models\Project2226PointSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project2226-point-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'forecast_attracting_finance') ?>

    <?= $form->field($model, 'Forecast_attracting_finance') ?>

    <?= $form->field($model, 'involved fact') ?>

    <?= $form->field($model, 'forecast_period') ?>

    <?php // echo $form->field($model, 'forecast_year') ?>

    <?php // echo $form->field($model, 'project_id') ?>

    <?php // echo $form->field($model, 'order_number') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
