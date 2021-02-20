<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\ExchangeRate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exchange-rate-form">

    <?php $form = ActiveForm::begin([
        'id' => $model->formName(),
        'method' => 'post',
        'enableAjaxValidation' => true,
        'validationUrl' =>Url::toRoute('exchange-rate/validate'),
    ]); ?>

    <div class="row">
        <label class="form-group pl-4 col-lg-12" for=""><?=Yii::t('app', 'Currency')?></label>
        <div class="col-lg-10">
            <?= $form->field($model, 'currency_id')->widget(Select2::classname(), [
                'data' => $model::getCurrencyItems(),
                'size' => Select2::SMALL,
                'options' => ['placeholder' => 'Select a currency ...', 'class' => 'currency'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false) ?>
        </div>
        <div class="col-lg-2 pl-0">
            <button type="button"
                    class="btn btn-sm-button btn-outline-primary kt_department_type"
                    href="<?=Url::to(['/structure/department/references-create?references_type_id=1'])?>"
                    data-toggle="modal"
                    data-target="#exampleModalScrollable">

                <i class="la la-plus ml-1"></i>
            </button>
        </div>
    </div>

    <?= $form->field($model, 'amount')->textInput(['class' => 'number form-control']) ?>

    <div class="row">
        <label class="form-group pl-4 col-lg-12" for=""><?=Yii::t('app', 'To currency')?></label>
        <div class="col-lg-10">
            <?= $form->field($model, 'to_currency_id')->widget(Select2::classname(), [
                'data' => $model::getCurrencyItems(),
                'size' => Select2::SMALL,
                'options' => ['placeholder' => 'Select a currency ...', 'class' => 'currency'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false) ?>
        </div>
        <div class="col-lg-2 pl-0">
            <button type="button"
                    class="btn btn-sm-button btn-outline-primary kt_department_type"
                    href="<?=Url::to(['/structure/department/references-create?references_type_id=1'])?>"
                    data-toggle="modal"
                    data-target="#exampleModalScrollable">

                <i class="la la-plus ml-1"></i>
            </button>
        </div>
    </div>

    <?= $form->field($model, 'to_amount')->textInput(['class' => 'number form-control']) ?>

    <?= $form->field($model, 'status')->dropDownList([
        $model::STATUS_ACTIVE => Yii::t('app', 'Active'),
        $model::STATUS_INACTIVE => Yii::t('app', 'Inactive'),
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton('<i class="la la-save"></i>' . Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-outline-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$js = <<<JS
    $('.modal-title').html('{$this->title}');
    
    $('body').delegate('.kt_department_type', 'click', function(e) {
        e.preventDefault();
        let url=$(this).attr('href');
        $('.modal-body').load(url); 
    })
JS;
$this->registerJs($js);

