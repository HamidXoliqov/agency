<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\NavType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nav-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="la la-save"></i>'.Yii::t('app', 'Save'), ['class' => 'btn btn-outline-primary btn-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
