<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\structure\models\Department */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="org-classification-form">

        <?php $form = ActiveForm::begin([
            'id' => $model->formName(),
            'method' => 'post',
            'enableAjaxValidation' => true,
            'validationUrl' => Url::toRoute('org-classification/validate'),
        ]); ?>
        <input type="hidden" name="parent_id" id="parent_id">

        <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'stat_code')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tax_code')->textInput(['maxlength' => true]) ?>

        <!-- Button trigger modal-->

        <div class="offcanvas-footer">
            <?= Html::submitButton('<i class="la la-save"></i>' . Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-outline-primary  btn-shadow font-weight-bolder text-uppercase']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>

<?php
$js = <<< JS
$("form input:text, form textarea").first().focus();
$('body').delegate('input', 'keyup', function(e) {
    var value = $('#kt_tree_1 li');
    var id;
    value.each(function(index, item) {
        if ($(item).attr('aria-selected') == 'true') {
            id = $(item).val();
            $('#parent_id').val(id);
        }
    });
});

JS;
$this->registerJs($js)
?>
