<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\structure\models\Department */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="department-form">

        <?php $form = ActiveForm::begin([
            'id' => $model->formName(),
            'method' => 'post',
            'enableAjaxValidation' => true,
            'validationUrl' => Url::toRoute('department/validate'),
        ]); ?>
        <input type="hidden" name="parent_id" id="parent_id">

        <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'short_name')->textInput(['maxlength' => true]) ?>

        <div class="row">
            <!-- <label class="form-group pl-4" for=""><?//=Yii::t('app', 'Select Currency')?></label>
            <div class="col-lg-10">
                <?//= $form->field($model, 'currency_id')->widget(Select2::classname(), [
                //     'data' => $model::getCurrencyItems(),
                //     'size' => Select2::SIZE_SMALL,
                //     'options' => ['placeholder' => 'Select a state ...', 'id' => 'currency'],//,'multiple'=>true
                //     'pluginOptions' => [
                //         'allowClear' => true
                //     ],
                // ])->label(false) 
                ?>
            </div>
            <div class="col-lg-2 pl-0">
                <button type="button"
                        class="btn btn-sm-button btn-outline-primary kt_department_type"
                        href="<?//=Url::to(['/structure/department/references-create?references_type_id=1'])?>"
                        data-toggle="modal"
                        data-target="#exampleModalScrollable">

                    <i class="la la-plus ml-1"></i>
                </button>
            </div> -->
        </div>

        <div class="row">
            <label class="form-group pl-4" for=""><?=Yii::t('app', 'Select Department type')?></label>
            <div class="col-lg-10">
                <?= $form->field($model, 'department_type_id')->widget(Select2::classname(), [
                    'data' => $model::getDepartmentTypeItems(),
                    'size' =>Select2::SIZE_SMALL,
                    'options' => ['placeholder' => 'Select a state ...', 'id' => 'department_type'],//,'multiple'=>true
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false) ?>
            </div>
            <div class="col-lg-2 pl-0">
                <button type="button"
                        class="btn btn-sm-button btn-outline-primary kt_department_type"
                        href="<?=Url::to(['/structure/department/references-create?references_type_id=2'])?>"
                        data-toggle="modal"
                        data-target="#exampleModalScrollable">

                    <i class="la la-plus ml-1"></i>
                </button>
            </div>
        </div>

        <?php //echo $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>
        <?php //echo $form->field($model, 'okonx')->textInput(['maxlength' => true]) ?>
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

$('body').delegate('.kt_department_type', 'click', function(e) {
    e.preventDefault();
    let url=$(this).attr('href');
    $('.modal-body').load(url); 
});
JS;
$this->registerJs($js)
?>
