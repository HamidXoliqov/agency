<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\References */
/* @var $form yii\widgets\ActiveForm */
/* @var $references_type_id */
?>

<?php $form = ActiveForm::begin([
    'id' => $model->formName(),
    'method' => 'post',
//    'enableAjaxValidation' => true,
//    'validationUrl' =>Url::toRoute('references/validate'),
]); ?>
<?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'name_en')->textInput(['maxlength' => true,]) ?>

<?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'token')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?>
<?php if (!empty($references_type_id)): ?>
    <?= $form->field($model, 'references_type_id')->hiddenInput(['maxlength' => true, 'value' => $references_type_id])->label(false) ?>
<?php endif; ?>
<?= $form->field($model, 'status')->dropDownList([
    $model::STATUS_ACTIVE => Yii::t('app', 'Active'),
    $model::STATUS_INACTIVE => Yii::t('app', 'Inactive'),
]); ?>
<div class="offcanvas-footer">
    <?= Html::submitButton('<i class="la la-save"></i>'.Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-outline-primary']) ?>
</div>
<?php ActiveForm::end(); ?>
<!--end::Form-->
<?php
$js = <<<JS
    $('.modal-title').html('{$this->title}');
JS;
$this->registerJs($js);

?>