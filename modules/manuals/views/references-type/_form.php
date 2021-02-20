<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\ReferencesType*/
/* @var $form yii\widgets\ActiveForm */
?>

<!--begin::Form-->
<?php $form = ActiveForm::begin([
    'id' => $model->formName(),
    'method' => 'post',
//    'enableAjaxValidation' => true,
//    'validationUrl' =>Url::toRoute('contragent-type/validate'),
]); ?>
    <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'uzbekcha nomi')]) ?>
    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'inglischa nomi')]) ?>
    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'ruscha nomi')]) ?>
    <?= $form->field($model, 'token')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Token')]) ?>
<?= $form->field($model, 'status')->dropDownList([
    $model::STATUS_ACTIVE => Yii::t('app', 'Active'),
    $model::STATUS_INACTIVE => Yii::t('app', 'Inactive'),
]); ?>
    <?= Html::submitButton('<i class="la la-save"></i>'.Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-outline-primary']) ?>

<?php ActiveForm::end(); ?>

<?php
$js = <<< JS
$(document).ready(function(e) {
        $('.modal-title').html('{$this->title}');
        $('.help-block').css({'color':'red'});
});
JS;
$this->registerJs($js);
?>