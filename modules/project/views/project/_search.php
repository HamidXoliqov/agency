<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\project\models\ProjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'deadline_date') ?>

    <?= $form->field($model, 'project_capacity') ?>

    <?= $form->field($model, 'total_cost') ?>

    <?php // echo $form->field($model, 'total_cost_currency_id') ?>

    <?php // echo $form->field($model, 'reamin_on_year_begin') ?>

    <?php // echo $form->field($model, 'remain_on_year_begin_currency_id') ?>

    <?php // echo $form->field($model, 'assimilation') ?>

    <?php // echo $form->field($model, 'production_time') ?>

    <?php // echo $form->field($model, 'delivery_time') ?>

    <?php // echo $form->field($model, 'installation_time') ?>

    <?php // echo $form->field($model, 'add_info') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'lending_bank_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
