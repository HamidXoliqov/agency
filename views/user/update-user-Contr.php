<?php

use app\modules\manuals\models\Contragent;
use app\modules\manuals\models\MysoliqRegion;
use app\modules\manuals\models\MysoliqDistrict;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\Contragent */
/* @var $form yii\widgets\ActiveForm */
/* @var $type_id */
$this->title = Yii::t('app', 'Update');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Department'), 'url' => ['department']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-custom example example-compact" style="background-color: rgb(250,250,250);">
    <div class="container-fluid mt-5">
        <?php
        $form = ActiveForm::begin([
            'id' => $model->id,
            'method' => 'post',
    //            'enableAjaxValidation' => true,
    //            'validationUrl' =>Url::toRoute('contragent/validate'),
        ]); ?>
        <div class="row">
            <div class="col-lg-3 form-group">
                <div class="form-group">
                    <label><?php echo Yii::t('app', 'Inn')?></label>
                    <div class="input-group">
                        <input type="text" id="contragent-inn" disabled class="form-control" name="Contragent[inn]" maxlength="9" aria-invalid="false" value="<?php echo $model->inn; ?>">
                    </div>
                    <div class="help-block"></div>
                </div>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'oked')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'vatcode')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-3">
                <!--<div class="form-group">
                    <label><?php /*echo Yii::t('app', 'Region')*/?></label>
                    <div class="input-group">
                        <label id="contragent-region" class="form-control"><?php /*echo $model::getRegion($model->district_id)['fullname']*/?></label>
                    </div>
                </div>-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php
                if (!empty($modelys)) {
                    foreach ($modelys as $value) {
                        $selected[]  = $value['org_classification_id'];
                    }
                }
                ?>
                <?= $form->field($modely, 'org_classification_id')->widget(Select2::classname(), [
                    'data' => $model::getOrgClassificationId(),
                    'size' =>Select2::SIZE_SMALL,
                    'options' => ['value'=>(!$model->isNewRecord ? $selected : ''),'placeholder' => 'Select a state ...', 'multiple'=>true],
                    'pluginOptions' => [
                        'escapeMarkup' => new JsExpression('function(markup){return markup;}'),
                        'allowClear' => true
                    ],
                ])->label(Yii::t('app', 'Org Classification')) ?>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label" for="contragent-ns10name"><?php echo Yii::t('app', 'Region ID') ?></label>
                    <input type="text" class="form-control" disabled="disabled" id="contragent-ns10name" value="<?php echo (!empty($region_name)) ? $region_name : '' ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label" for="contragent-ns11name"><?php echo Yii::t('app', 'District ID') ?></label>
                    <input type="text" class="form-control" disabled="disabled" id="contragent-ns11name" value="<?php echo (!empty($district_name)) ? $district_name : '' ?>">
                </div>
            </div>
        </div>
        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'reg_date', ['options' => ['class' => '']])->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'reg_num', ['options' => ['class' => '']])->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'region_id', ['options' => ['class' => '']])->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'district_id', ['options' => ['class' => '']])->hiddenInput()->label(false) ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'short_name')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'director_inn', ['options' => ['class' => '']])->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'director')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?php echo $form->field($model, 'accounter_inn', ['options' => ['class' => '']])->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'accounter')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'accounter_tel')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'bank_code')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'bank')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'fund')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'bank_account_number')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'nc1Code', ['options' => ['class' => '']])->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'nc1Name')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'nc2Code', ['options' => ['class' => '']])->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'nc2Name')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'nc3Code', ['options' => ['class' => '']])->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'nc3Name')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'nc4Code', ['options' => ['class' => '']])->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'nc4Name')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'nc5Code', ['options' => ['class' => '']])->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'nc5Name')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'nc6Code', ['options' => ['class' => '']])->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'nc6Name')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'ns1Code', ['options' => ['class' => '']])->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'ns1Name')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'ns3Code', ['options' => ['class' => '']])->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'ns3Name')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'ns4Code', ['options' => ['class' => '']])->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'ns4Name')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'ns13Code', ['options' => ['class' => '']])->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'ns13Name')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'na1Code', ['options' => ['class' => '']])->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'na1Name')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'stateCode', ['options' => ['class' => '']])->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'stateName')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
        </div>
        
        <?= $form->field($model, 'add_info')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'status')->dropDownList(Contragent::getStatusForContr()) ?>

        <div class="form-group">
            <?= Html::submitButton('<i class="la la-save"></i>'.Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-outline-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
<?php
$this->registerJsVar('fillMessage',  Yii::t('app', "Fill the tin"));
$this->registerJsVar('searchUrl',  Url::to('search-by-tin'));
$js = <<<JS
    $('#search_contragent').on('click', function(e) {
        var this_val = $('#contragent-inn').val();
        if (this_val=='' || this_val.length != 9) {
            Swal.fire(fillMessage, '', "warning");
        }
        $.ajax({
            url:searchUrl,
            data:{
                _csrf: $('input[name="_csrf"]').val(),
                inn: $('#contragent-inn').val()
            },
            type:'POST',
            success: function(response){
                if(response.status == 'success'){
                    $('#contragent-oked').val(response.data.okpo).trigger('change');
                    $('#contragent-address').val(response.data.address).trigger('change');
                    $('#contragent-reg_date').val(response.data.regDate).trigger('change');
                    $('#contragent-reg_num').val(response.data.regNum).trigger('change');
                    $('#contragent-name').val(response.data.nameFull).trigger('change');
                    $('#contragent-short_name').val(response.data.name).trigger('change');
                    $('#contragent-director').val(response.data.gdFullName).trigger('change');
                    $('#contragent-tel').val(response.data.gdTelWork).trigger('change');
                    $('#contragent-director_inn').val(response.data.gdTin).trigger('change');
                    $('#contragent-ns10name').val(response.data.ns10Name).trigger('change');
                    $('#contragent-region_id').val(response.data.ns10Code).trigger('change');
                    $('#contragent-ns11name').val(response.data.ns11Name).trigger('change');
                    $('#contragent-district_id').val(response.data.ns11Code).trigger('change');
                    $('#contragent-accounter').val(response.data.gbFullName).trigger('change');
                    $('#contragent-accounter_tel').val(response.data.gbTelWork).trigger('change');
                    $('#contragent-accounter_inn').val(response.data.gbTin).trigger('change');
                    $('#contragent-bank_code').val(response.data.ns2Code).trigger('change');
                    $('#contragent-bank').val(response.data.ns2Name).trigger('change');
                    $('#contragent-fund').val(response.data.fund).trigger('change');
                    $('#contragent-bank_account_number').val(response.data.account).trigger('change');
                    $('#contragent-nc1code').val(response.data.nc1Code).trigger('change');
                    $('#contragent-nc1name').val(response.data.nc1Name).trigger('change');
                    $('#contragent-nc2code').val(response.data.nc2Code).trigger('change');
                    $('#contragent-nc2name').val(response.data.nc2Name).trigger('change');
                    $('#contragent-nc3code').val(response.data.nc3Code).trigger('change');
                    $('#contragent-nc3name').val(response.data.nc3Name).trigger('change');
                    $('#contragent-nc4code').val(response.data.nc4Code).trigger('change');
                    $('#contragent-nc4name').val(response.data.nc4Name).trigger('change');
                    $('#contragent-nc5code').val(response.data.nc5Code).trigger('change');
                    $('#contragent-nc5name').val(response.data.nc5Name).trigger('change');
                    $('#contragent-nc6code').val(response.data.nc6Code).trigger('change');
                    $('#contragent-nc6name').val(response.data.nc6Name).trigger('change');
                    $('#contragent-ns1code').val(response.data.ns1Code).trigger('change');
                    $('#contragent-ns1name').val(response.data.ns1Name).trigger('change');
                    $('#contragent-ns3code').val(response.data.ns3Code).trigger('change');
                    $('#contragent-ns3name').val(response.data.ns3Name).trigger('change');
                    $('#contragent-ns4code').val(response.data.ns4Code).trigger('change');
                    $('#contragent-ns4name').val(response.data.ns4Name).trigger('change');
                    $('#contragent-ns13code').val(response.data.ns13Code).trigger('change');
                    $('#contragent-ns13name').val(response.data.ns13Name).trigger('change');
                    $('#contragent-na1code').val(response.data.na1Code).trigger('change');
                    $('#contragent-na1name').val(response.data.na1Name).trigger('change');
                    $('#contragent-statecode').val(response.data.stateCode).trigger('change');
                    $('#contragent-statename').val(response.data.stateName).trigger('change');

                    console.log(response.data);
                } else {
                    Swal.fire(response.errorMsg, '', "warning");
                }
            }
        });
    });
JS;
$this->registerJs($js);

// $css = <<<Css
//     .select2-container--krajee .select2-selection--multiple .select2-selection__choice{
//     color:black;
//     background: #71b0cf;
//     box-shadow: inset 0 4px 5px #eee, 0px 2px 3px #222;
//     }
// Css;
// $this->registerCss($css);
?>