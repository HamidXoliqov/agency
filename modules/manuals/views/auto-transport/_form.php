<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\AutoTransport */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auto-transport-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        $model::STATUS_ACTIVE => Yii::t('app', 'Active'),
        $model::STATUS_INACTIVE => Yii::t('app', 'Inactive'),
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="la la-save"></i>'.Yii::t('app', 'Save'), ['class' => 'btn btn-outline-primary btn-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
