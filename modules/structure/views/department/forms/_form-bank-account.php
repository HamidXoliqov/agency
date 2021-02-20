<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\structure\models\DepBankAccount */
/* @var $form yii\widgets\ActiveForm */
/* @var $regions_tree */
?>
    <div class="department-form">
        <?php $form = ActiveForm::begin([
            'id' => $model->formName(),
            'method' => 'post',
            'enableAjaxValidation' => true,
            'validationUrl' => Url::toRoute('department/validate')
        ]); ?>
        <input type="hidden" name="department_id" id="parent_id">

        <?= $form->field($model, 'bank_account')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'bank')->widget(Select2::classname(), [
            'data' => $model::getBankItems(),
            'size' => Select2::SIZE_SMALL,
            'options' => ['placeholder' => 'Select a state ...'],//,'multiple'=>true
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>


        <div class="row">
            <label class="form-group pl-4" for=""><?=Yii::t('app', 'Select an Account Type')?></label>
            <div class="col-lg-10">
                <?= $form->field($model, 'account_type')->widget(Select2::classname(), [
                    'data' => $model::getAccountTypeItems(),
                    'size' => Select2::SIZE_SMALL,
                    'options' => ['placeholder' => 'Select a state ...', 'id' => 'account_type'],//,'multiple'=>true
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false) ?>
            </div>
            <div class="col-lg-2 pl-0">
                <button type="button"
                        class="btn btn-sm-button btn-outline-primary kt_department_type"
                        href="<?=Url::to(['/structure/department/references-create?references_type_id=3'])?>"
                        data-toggle="modal"
                        data-target="#exampleModalScrollable">

                    <i class="la la-plus ml-1"></i>
                </button>
            </div>
        </div>

        <?= $form->field($model, 'status')->dropDownList([
            $model::STATUS_ACTIVE => Yii::t('app', 'Active'),
            $model::STATUS_INACTIVE => Yii::t('app', 'Inactive'),
        ]); ?>

        <div class="offcanvas-footer">
            <?= Html::submitButton('<i class="la la-save"></i>' . Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-outline-primary  btn-shadow font-weight-bolder text-uppercase save-and-finish']) ?>
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
})

$('body').delegate('.kt_department_type', 'click', function(e) {
    e.preventDefault();
    let url=$(this).attr('href');
    $('.modal-body').load(url); 
})

JS;
$this->registerJs($js)
?>