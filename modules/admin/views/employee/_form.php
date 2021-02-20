<?php

use app\modules\manuals\models\Contragent;
use app\models\BaseModel;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\web\JsExpression;
use yii\bootstrap\Collapse;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\Contragent */
/* @var $form yii\widgets\ActiveForm */
/* @var $type_id */

?>
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-body p-0">
                <div class="wizard wizard-1" id="kt_wizard_v2" data-wizard-state="step-first" data-wizard-clickable="true">
                    <div class="kt-grid__item">
                        <!--begin::Wizard Nav-->
                        <div class="wizard-nav border-bottom">
                            <div class="wizard-steps p-2 row">
                                <div class="wizard-step col-4" data-wizard-type="step" data-wizard-state="current">
                                    <a href=""></a>
                                    <div class="wizard-label mx-auto">
                                        <span class="svg-icon svg-icon-4x wizard-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Chat-check.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <h3 class="wizard-title"><?php echo Yii::t('app', 'Create Employee');?></h3>
                                    </div>
                                </div>
                                <span class="svg-icon svg-icon-xl wizard-arrow col-4 text-center">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <div class="wizard-step col-4" data-wizard-type="step">
                                    <div class="wizard-label mx-auto">
                                        <span class="svg-icon svg-icon-4x wizard-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Display1.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z" fill="#000000" opacity="0.3" />
                                                    <path d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z" fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <h3 class="wizard-title"><?php echo Yii::t('app', 'Create Users');?></h3>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Nav-->
                    </div>
                    <div class="row justify-content-center my-5 px-8 my-lg-8 px-lg-10">
                        <div class="col-xl-12 col-xxl-7">
                            <!--begin::Form Wizard-->
                                <?php $form = ActiveForm::begin([
                                    'id' => 'kt_form',
                                    'method' => 'post',
                                ]); ?>
                                <!--begin: Wizard Step 1-->
                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                    <div class="row">
                                        <div class="col-lg-3 form-group">
                                            <div class="form-group">
                                                <label><?php echo Yii::t('app', 'Inn')?></label>
                                                <div class="input-group">
                                                    <input type="text" id="employee-inn" class="form-control form-control-solid" name="Contragent" maxlength="9" aria-invalid="false" value="<?php echo $model->tin; ?>">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary btn-xs search_contragent" type="button"><span class="svg-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                                <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                                                            </g>
                                                        </svg>
                                                    </span></button>
                                                    </div>
                                                </div>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <?= $form->field($model, 'fullName', ['options' => ['class' => '']])->hiddenInput(['maxlength' => true,'class' => 'employee-fullname'])->label(false); ?>
                                            <div class="form-group field-employee-fullname required">
                                                <label class="control-label" for="fio"><?php echo Yii::t('app', 'Full Name')?></label>
                                                <input type="text" id="fio" readonly class="form-control form-control-solid employee-fullname" name="fio" value="<?php echo $model->fullName; ?>">
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-3"> -->
                                            <!--<div class="form-group">
                                                <label><?php /*echo Yii::t('app', 'Region')*/?></label>
                                                <div class="input-group">
                                                    <label id="contragent-region" class="form-control"><?php /*echo $model::getRegion($model->district_id)['fullname']*/?></label>
                                                </div>
                                            </div>-->
                                        <!-- </div> -->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?= $form->field($model, 'address')->textInput(['maxlength' => true,'readonly' => true, 'class' => 'form-control form-control-solid']) ?>
                                        </div>
                                        <!-- <div class="col-md-12">
                                        </div> -->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            
                                            <?= $form->field($model, 'birthDate')->textInput(['readonly' => true, 'class' => 'form-control form-control-solid']) ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?= $form->field($model, 'sex', ['options' => ['class' => '']])->hiddenInput()->label(false) ?>
                                            <?= $form->field($model, 'sexName')->textInput(['maxlength' => true,'readonly' => true, 'class' => 'form-control form-control-solid']) ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <?= $form->field($model, 'passSeries')->textInput(['maxlength' => true,'readonly' => true, 'class' => 'form-control form-control-solid']) ?>
                                                </div>
                                                <div class="col-9">
                                                    <?= $form->field($model, 'passNumber')->textInput(['readonly' => true, 'class' => 'form-control form-control-solid']) ?>                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <?= $form->field($model, 'passDate')->textInput(['readonly' => true, 'class' => 'form-control form-control-solid']) ?>                
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <?= $form->field($model, 'docName')->textInput(['maxlength' => true,'readonly' => true, 'class' => 'form-control form-control-solid']) ?>
                                            <?= $form->field($model, 'docCode', ['options' => ['class' => '']])->hiddenInput(['readonly' => true, 'class' => 'form-control form-control-solid'])->label(false) ?>
                                        </div>
                                        <div class="col-md-8">
                                            <?= $form->field($model, 'passOrg')->textInput(['maxlength' => true,'readonly' => true, 'class' => 'form-control form-control-solid']) ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?= $form->field($model, 'ns10Code', ['options' => ['class' => '']])->hiddenInput()->label(false) ?>
                                            <?= $form->field($model, 'ns10Name')->textInput(['maxlength' => true,'readonly' => true, 'class' => 'form-control form-control-solid'])->label(Yii::t('app', 'Region ID')) ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?= $form->field($model, 'ns11Code', ['options' => ['class' => '']])->hiddenInput()->label(false) ?>
                                            <?= $form->field($model, 'ns11Name')->textInput(['maxlength' => true,'readonly' => true, 'class' => 'form-control form-control-solid'])->label(Yii::t('app', 'District ID')) ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?= $form->field($model, 'isitd', ['options' => ['class' => '']])->hiddenInput(['readonly' => true, 'class' => 'form-control form-control-solid'])->label(false) ?>
                                            <?= $form->field($model, 'isNotary', ['options' => ['class' => '']])->hiddenInput(['readonly' => true, 'class' => 'form-control form-control-solid'])->label(false) ?>
                                            <?= $form->field($model, 'personalNum')->textInput(['readonly' => true, 'class' => 'form-control form-control-solid']) ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?= $form->field($model, 'zipCode')->textInput(['readonly' => true, 'class' => 'form-control form-control-solid']) ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?= $form->field($model, 'ns13Code', ['options' => ['class' => '']])->hiddenInput(['readonly' => true, 'class' => 'form-control form-control-solid'])->label(false) ?>
                                            <?= $form->field($model, 'ns13Name')->textInput(['maxlength' => true,'readonly' => true, 'class' => 'form-control form-control-solid']) ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?= $form->field($model, 'tinDate')->textInput(['readonly' => true, 'class' => 'form-control form-control-solid']) ?>

                                            <?= $form->field($model, 'dateModify', ['options' => ['class' => '']])->hiddenInput(['readonly' => true, 'class' => 'form-control form-control-solid'])->label(false) ?>
                                            <?= $form->field($model, 'tin', ['options' => ['class' => '']])->hiddenInput(['readonly' => true, 'class' => 'form-control form-control-solid'])->label(false) ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?= $form->field($model, 'phone')->widget(MaskedInput::className(),['mask' => '\+\9\9\8\(99\) 999 99 99'])?>
                                        </div>
                                        <div class="col-md-6">
                                            <?= $form->field($model, 'department_id')->widget(Select2::classname(), [
                                                'data' => $model::getDepartmentList(),
                                                'size' =>Select2::SIZE_SMALL,
                                                'options' => [
                                                    'placeholder' => Yii::t('app', 'Select'),
                                                    'name' => 'department_id',
                                                ],
                                                'pluginOptions' => [
                                                    'escapeMarkup' => new JsExpression('function(markup){return markup;}'),
                                                    'allowClear' => true
                                                ],
                                            ])->label(Yii::t('app', 'Select Department for this Employee')) ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <?= $form->field($model, 'duty', ['options' => ['class' => '']])->hiddenInput()->label(false)?>
                                            <div class="form-group field-email has-success">
                                                <label for="duty" class="control-label"><?php echo Yii::t('app', 'Duty');?></label>
                                                <div class="input-group input-group-sm input-group-solid">
                                                    <input type="text" id="duty" class="form-control <?php if($model->duty == 'true'){ echo 'bg-danger';}elseif($model->duty == 'false'){echo 'bg-success';}else{echo '';}; ?> form-control-solid text-center text-white" readonly value="<?php if($model->duty == 'true'){ echo Yii::t('app', 'Debtor');}elseif($model->duty == 'false'){echo Yii::t('app', 'Not In Debt');}else{echo '';}; ?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Step 1-->
                                <!--begin::Step 2-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="row <?php echo (empty($model->id)) ? 'offcanvas' : '';?>" id="add_user">
                                                <div class="col-6">
                                                    <div class="form-group field-email has-success">
                                                        <label for="email" class="control-label"><?php echo Yii::t('app', 'Full Name');?></label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input type="text" id="fullname" class="form-control form-control-lg form-control-solid employee-fullname"  disabled value="<?php echo (!empty($model->id) ? $model->fullName : '');?>" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group field-email has-success">
                                                        <label for="email" class="control-label"><?php echo Yii::t('app', 'Email');?></label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="la la-at"></i>
                                                                </span>
                                                            </div>
                                                            <input type="email" id="email" class="form-control form-control-lg form-control-solid"  <?php echo (empty($model->id) ? 'disabled' : '');?> placeholder="Email" name="Users[email]" value="<?php echo (!empty($model->id) ? $user->email : '');?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <?= $form->field($user, 'username')->textInput(['maxlength' => true, 'id' => 'username', 'disabled' => ((empty($model->id) ? true : false)), 'class' => 'form-control form-control-solid form-control-lg']) ?>
                                                    <div class="form-group field-password has-success">
                                                        <label for="email" class="control-label"><?php echo Yii::t('app', 'Password');?></label>
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <input type="password" id="password" class="form-control form-control-solid form-control-lg" disabled="true" name="Users[password]" value="" />
                                                        </div>
                                                    </div>
                                                    <?= $form->field($user, 'department_id',['options' => ['class' => 'd-none']])->hiddenInput(['maxlength' => true, 'id' => 'department_id', 'disabled' => ((empty($model->id) ? true : false))]) ?>
                                                </div>
                                                <div class="col-12">
                                                    <?= $form->field($user, 'item_name')->widget(Select2::classname(), [
                                                        'data' => $user::getAssignment(),
                                                        'size' => Select2::SIZE_MEDIUM,
                                                        'options' => [
                                                            'placeholder' => Yii::t('app', 'Select'),
                                                        ],
                                                        'pluginOptions' => [
                                                            'allowClear' => true,
                                                            'multiple' => true,
                                                        ],
                                                    ])->label(Yii::t('app', 'Select Roles for this user')); ?>
                                                </div>
                                            </div>
                                            <div class="row empty_user <?php echo (!empty($model->id)) ? 'offcanvas' : '';?>">
                                                <strong class="col-12 text-center"><big style="color: #B5B5C3 !important" class="lead display-4"><b class="pr-5"><?php echo Yii::t('app', 'Do you create a user');?></b><b style="font-size: 15px !important; margin-top: -5px !important;" class="mb-5 pr-3 fas fa-plus fa-1x"></b></big><i class="pr-3 fas fa-user fa-2x"></i><i class="pl-5 fas fa-question fa-3x"></i></strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Step 2-->
                                
                                <!--begin::Actions-->
                                <div class="d-flex justify-content-between border-top pt-5">
                                    <div class="mr-2">
                                        <button class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-prev"><?php echo Yii::t('app', 'Previous');?></button>
                                    </div>
                                    <div>
                                        <?php if (empty($model->id)) { echo
                                         Html::a('<i class="la la-user"></i><span class="add">'.Yii::t('app', 'Add User').'</span><span class="clear offcanvas">'.Yii::t('app', 'Clear User').'</span>', ['#'], ['class' => 'btn btn-light-primary font-weight-bold text-uppercase px-9 py-4 add_user search_contragent', 'data-wizard-type' => 'action-submit']);} ?>
                                        <?= Html::submitButton('<i class="la la-save"></i>'.Yii::t('app', 'Save'), ['class' => 'btn btn-light-success font-weight-bold text-uppercase px-9 py-4', 'data-wizard-type' => 'action-submit']) ?>
                                        <button class="btn btn-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-next"><?php echo Yii::t('app', 'Next Step');?></button>
                                    </div>
                                </div>
                                <!--end::Actions-->
                            <?php ActiveForm::end(); ?>
                            <!--end::Form Wizard-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->

<?php
$this->registerJsVar('fillMessage',  Yii::t('app', "Fill the tin"));
$this->registerJsVar('searchUrl',  Url::to('search-by-tin'));

$this->registerJsVar('sorryText',  Yii::t('app', 'Sorry something went wrong'));
$this->registerJsVar('fullnameRequired',  Yii::t('app', 'Fullname is required'));
$this->registerJsVar('usernameRequired',  Yii::t('app', 'Username is required'));
$this->registerJsVar('passwordRequired',  Yii::t('app', 'Password is required'));
$this->registerJsVar('confirmPasswordRequired',  Yii::t('app', 'Confirm Password is required'));
$this->registerJsVar('confirmPasswordSame',  Yii::t('app', 'Confirm Password must be the same'));
$this->registerJsVar('requiredField',  Yii::t('app', 'This Field is required'));
$this->registerJsVar('xlsField',  Yii::t('app', 'This Field must be EXCEL file'));
$this->registerJsVar('urlCheck',  \yii\helpers\Url::to('/site/check-user'));

$js = <<<JS

"use strict";
const passwordMeter = document.getElementById('passwordMeter');
const randomNumber = function(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
};

var KTWizard2 = function () {

    var _wizardEl;
    var _formEl;
    var _wizard;
    var _validations = [];
    
    var initWizard = function () {
        _wizard = new KTWizard(_wizardEl, {
            startStep: 1, // initial active step number
            clickableSteps: false // to make steps clickable this set value true and add data-wizard-clickable="true" in HTML for class="wizard" element
        });
    
        // Validation before going to next page
        _wizard.on('beforeNext', function (wizard) {
            _validations[wizard.getStep() - 1].validate().then(function (status) {
                if (status == 'Valid') {
                    _wizard.goNext();
                    KTUtil.scrollTop();
                } else {
                    Swal.fire({
                        text: sorryText,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "OK",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light"
                        }
                    }).then(function () {
                        KTUtil.scrollTop();
                    });
                }
            });
    
            _wizard.stop();  // Don't go to the next step
        });
    
        // Change event
        _wizard.on('change', function (wizard) {
            KTUtil.scrollTop();
        });
    }
    
    var initValidation = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        // Step 1
        _validations.push(FormValidation.formValidation(
            _formEl,
            {
                fields: {
                    fio: {
                        validators: {
                            notEmpty: {
                                message: requiredField
                            }
                        }
                    },
                    Contragent: {
                        validators: {
                            notEmpty: {
                                message: requiredField
                            }
                        }
                    },
                    department_id: {
                        validators: {
                            notEmpty: {
                                message: requiredField
                            }
                        }
                    },
                    confirm_password: {
                        validators: {
                            notEmpty: {
                                message: requiredField
                            },
                            identical: {
                                enabled: false,
                                compare: function() {
                                    return _formEl.querySelector('[name="password"]').value;
                                },
                                message: confirmPasswordSame,
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap(),
                }
            }
        ));
    }
    return {
        // public functions
        init: function () {
            _wizardEl = KTUtil.getById('kt_wizard_v2');
            _formEl = KTUtil.getById('kt_form');
    
            initWizard();
            initValidation();
        }
    };
}();

jQuery(document).ready(function () {
    KTWizard2.init();
});


$('.search_contragent').on('click', function(e) {
        var this_val = $('#employee-inn').val();
        if (this_val=='' || this_val.length != 9) {
            Swal.fire(fillMessage, '', "warning");
        }
        $.ajax({
            url:searchUrl,
            data:{
                _csrf: $('input[name="_csrf"]').val(),
                inn: $('#employee-inn').val()
            },
            type:'POST',
            success: function(response){
                if(response.status == 'success'){
                    $('#employee-address').val(response.data.address).trigger('change');
                    $('.employee-fullname').val(response.data.surName+' '+response.data.firstName+' '+response.data.middleName).trigger('change');
                    $('#employee-birthdate').val(response.data.birthDate).trigger('change');
                    $('#employee-sex').val(response.data.sex).trigger('change');
                    $('#employee-sexname').val(response.data.sexName).trigger('change');
                    $('#employee-passseries').val(response.data.passSeries).trigger('change');
                    $('#employee-passnumber').val(response.data.passNumber).trigger('change');
                    $('#employee-passdate').val(response.data.passDate).trigger('change');
                    $('#employee-passorg').val(response.data.passOrg).trigger('change');
                    $('#employee-ns10code').val(response.data.ns10Code).trigger('change');
                    $('#employee-ns10name').val(response.data.ns10Name).trigger('change');
                    $('#employee-ns11code').val(response.data.ns11Code).trigger('change');
                    $('#employee-ns11name').val(response.data.ns11Name).trigger('change');
                    $('#employee-ns13code').val(response.data.ns13Code).trigger('change');
                    $('#employee-ns13name').val(response.data.ns13Name).trigger('change');
                    $('#employee-tindate').val(response.data.tinDate).trigger('change');
                    $('#employee-tin').val(response.data.tin).trigger('change');
                    $('#employee-zipcode').val(response.data.zipCode).trigger('change');
                    $('#employee-datemodify').val(response.data.dateModify).trigger('change');
                    $('#employee-personalnum').val(response.data.personalNum).trigger('change');
                    $('#employee-isnotary').val(response.data.isNotary).trigger('change');
                    $('#employee-isitd').val(response.data.isitd).trigger('change');
                    $('#employee-doccode').val(response.data.docCode).trigger('change');
                    $('#employee-docname').val(response.data.docName).trigger('change');
                    $('#employee-duty').val(response.data.duty).trigger('change');
                    $('#duty').val(response.duty).trigger('change');
                    $('#duty').addClass(response.dutyClass);
                    $('#address').val(response.data.address).trigger('change');

                    console.log(response.data);
                } else {
                    Swal.fire(response.errorMsg, '', "warning");
                }
            }
        });
    });
    $('body').delegate('.add_user', 'click', function(e) {
        e.preventDefault();
        $('.clear').removeClass('offcanvas');
        $('.add').addClass('offcanvas');
        $('.add_user').addClass('toggle');
        $('.empty_user').addClass('offcanvas');
        $('#add_user').removeClass('offcanvas');
        $('#username').prop("disabled", false);
        $('#password').prop("disabled", false);
        $('#email').prop("disabled", false);
    });
    $('body').delegate('.toggle', 'click', function(e) {
        e.preventDefault();
        $('.clear').addClass('offcanvas');
        $('.add').removeClass('offcanvas');
        $('.add_user').removeClass('toggle');
        $('.empty_user').removeClass('offcanvas');
        $('#add_user').addClass('offcanvas');
        $('#username').prop("disabled", true);
        $('#password').prop("disabled", true);
        $('#email').prop("disabled", true);
    })

JS;
$this->registerJs($js, \yii\web\View::POS_END);

$css = <<<CSS
    .select2-selection__rendered{
       background-color: #F3F6F9 !important;
       padding-top: 2px !important;
       padding-left: 2px !important;
       border-top-right-radius: 5px !important;
       border-top-left-radius: 5px !important;
    }
    .select2-selection, .select2-search, .select2-results__option, #employee-phone{
       background-color: #F3F6F9 !important;
       border: none!important;
    }
    .select2-dropdown.select2-dropdown--below, .select2-dropdown.select2-dropdown--above{
       border: none!important;
    }
    .select2-results__option.select2-results__option--highlighted{
       background-color: #337ab7 !important;
    }
    .select2-results__option[aria-selected="true"]{
       background-color: #E6EEF3 !important;
       color: black !important;
    }
    .select2-container--krajee .select2-selection--multiple .select2-selection__choice{
       background-color: #0a73bb;
       color: white;
    }
    .select2-selection__choice__remove{
        margin-top: -1px !important;
    }
    .select2-selection__choice{
        padding-top: 2px !important; 
        padding-bottom: 2px !important; 
    }
    .select2-selection--multiple .select2-selection__clear{
        margin-top: 2px !important;
    }
CSS;
$this->registerCss($css);
?>