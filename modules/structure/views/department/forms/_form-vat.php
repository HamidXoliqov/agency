<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\structure\models\Vat */
/* @var $form yii\widgets\ActiveForm */
?>
    <div class="department-form">
        <?php $form = ActiveForm::begin([
            'id' =>$model->formName(),
            'method' => 'post',
            'enableAjaxValidation' => true,
            'validationUrl' =>Url::toRoute('department/validate')
        ]); ?>
        <input type="hidden" name="department_id" id="parent_id">

        <?= $form->field($model, 'vat')->textInput(['maxlength' => true]) ?>

        <div class="offcanvas-footer">
            <?= Html::submitButton('<i class="la la-save"></i>'.Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-outline-primary  btn-shadow font-weight-bolder text-uppercase save-and-finish']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>

<?php
$url = \yii\helpers\Url::to(['department/create-address-ajax']);
$js = <<< JS
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