<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\structure\models\DepAddress */
/* @var $form yii\widgets\ActiveForm */
/* @var $regions_tree */
?>
    <div class="department-form">

        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'address'],
            'id' =>$model->formName(),
            'method' => 'post',
            'enableAjaxValidation' => true,
            'validationUrl' =>Url::toRoute('department/validate')
        ]); ?>
        <input type="hidden" name="department_id" id="parent_id" value="<?= $model->department_id ?>">
        <div class="text-center col-lg-12"><?= Yii::t('app', 'Physical Location') ?></div>
        <br>
        <div class="separator separator-solid"></div>
        <br>
        <?= $form->field($model, 'physical_region')->widget(Select2::classname(), [
            'data' => $model::getRegionsItems(),
            'size' => Select2::SIZE_SMALL,
            'options' => ['placeholder' => 'Select a state ...'],//,'multiple'=>true
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>

        <?= $form->field($model, 'physical_location')->textInput(['maxlength' => true]) ?>

        <div class="text-center col-lg-12"><?= Yii::t('app', 'Legal Location') ?></div>
        <br>
        <div class="separator separator-solid"></div>
        <br>
        <?= $form->field($model, 'legal_region')->widget(Select2::classname(), [
            'data' => $model::getRegionsItems(),
            'size' => Select2::SIZE_SMALL,
            'options' => ['placeholder' => 'Select a state ...'],//,'multiple'=>true
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>

        <?= $form->field($model, 'legal_location')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tel')->widget(\yii\widgets\MaskedInput::className(),
            ['mask' => '+ \9\9\8 99 999 99 99']); ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <div class="offcanvas-footer">
            <?= Html::submitButton('<i class="la la-save"></i>' . Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-outline-primary  btn-shadow font-weight-bolder text-uppercase save-and-finish']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>

<?php
$url = \yii\helpers\Url::to(['department/create-address-ajax']);
$js = <<< JS
$('body').ready(function(e) {
    var value = $('#kt_tree_1 li');
    var id;
    value.each(function(index, item) {
        if ($(item).attr('aria-selected') == 'true') {
            id = $(item).val();
            console.log(id);
            $('#parent_id').val(id);
        }
    });
});
JS;
$this->registerJs($js)
?>