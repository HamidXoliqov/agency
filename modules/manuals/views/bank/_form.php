<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\Bank */
/* @var $form yii\widgets\ActiveForm */
?>


    <?php $form = ActiveForm::begin([
        'id' => $model->formName(),
        'method' => 'post',/*
        'enableAjaxValidation' => true,
        'validationUrl' =>Url::toRoute('bank/validate'),*/
    ]); ?>

                <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'mfo')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'status')->dropDownList([
                    $model::STATUS_ACTIVE => Yii::t('app', 'Active'),
                    $model::STATUS_INACTIVE => Yii::t('app', 'Inactive'),
                ]) ?>
                <?= Html::submitButton('<i class="la la-save"></i>'.Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-outline-primary']) ?>

    <?php ActiveForm::end(); ?>

<?php
$js = <<<JS
    $('.modal-title').html('{$this->title}');
JS;
$this->registerJS($js);
?>