<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use \app\modules\manuals\models\AppealStatus;
use app\modules\manuals\models\AppealType;
use app\modules\manuals\models\NavType;
use app\modules\manuals\models\PlantSchema;
use app\modules\subsidy\models\Appeal;
use app\modules\subsidy\models\AppealAttachment;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\modules\subsidy\models\Appeal */

$this->title = Yii::t('app', 'Create Appeal');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appeals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .subsidy-name{
        font-size: 22px!important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: 600!important;
        color: black!important;
        text-align: center;
    }
    .subsidy-table-header{
        font-size: 16px!important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: 600!important;
        color: black!important;
        text-align: center;
    }
    .subsidy-table-textarea{
        height: 80px;
        width: 100%;
    }
    .subsidy-header{
        display: flex;
        justify-content: center;
        font-size: 20px!important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: 600!important;
        color: black!important;
        text-align: center;
    }
    .ariza-hujjat-title{
        font-size: 16px!important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: 600!important;
        color: black!important;
    }
    .subsidy-work-name{
        font-size: 12px!important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: 600!important;
        color: black!important;
    }
</style>

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-body p-0">
                    <div class="wizard wizard-1" id="kt_projects_add" data-wizard-state="step-first"
                         data-wizard-clickable="true">
                        <div class="kt-grid__item">
                            <!--begin::Wizard Nav-->
                            <div class="wizard-nav border-bottom">
                                <div class="wizard-steps p-8 p-lg-10">
                                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                        <div class="wizard-label">
                                            <span class="svg-icon svg-icon-4x wizard-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Chat-check.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24"
                                                        version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z"
                                                                fill="#000000" fill-rule="nonzero"
                                                                opacity="0.3"/>
                                                        <path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z"
                                                                fill="#000000"/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <h3 class="wizard-title">Appeal Details</h3>
                                        </div>
                                        <span class="svg-icon svg-icon-xl wizard-arrow">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <rect fill="#000000" opacity="0.3"
                                                            transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                            x="11" y="5" width="2" height="14"
                                                            rx="1"/>
                                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                    <div class="wizard-step" data-wizard-type="step">
                                        <div class="wizard-label">
                                            <span class="svg-icon svg-icon-4x wizard-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Display1.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24"
                                                        version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z"
                                                                fill="#000000" opacity="0.3"/>
                                                        <path d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z"
                                                                fill="#000000"/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <h3 class="wizard-title">Project Details</h3>
                                        </div>
                                        <span class="svg-icon svg-icon-xl wizard-arrow">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <rect fill="#000000" opacity="0.3"
                                                            transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                            x="11" y="5" width="2" height="14"
                                                            rx="1"/>
                                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                    <div class="wizard-step" data-wizard-type="step">
                                        <div class="wizard-label">
                                            <span class="svg-icon svg-icon-4x wizard-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Globe.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24"
                                                        version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z"
                                                                fill="#000000" fill-rule="nonzero"/>
                                                        <circle fill="#000000" opacity="0.3" cx="12"
                                                                cy="10" r="6"/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <h3 class="wizard-title">Project work Details</h3>
                                        </div>
                                        <span class="svg-icon svg-icon-xl wizard-arrow">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <rect fill="#000000" opacity="0.3"
                                                            transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                            x="11" y="5" width="2" height="14"
                                                            rx="1"/>
                                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                    <div class="wizard-step" data-wizard-type="step">
                                        <div class="wizard-label">
                                            <span class="svg-icon svg-icon-4x wizard-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24"
                                                        version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                                                                fill="#000000"/>
                                                        <circle fill="#000000" opacity="0.3"
                                                                cx="18.5" cy="5.5" r="2.5"/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <h3 class="wizard-title">Appeal file and save</h3>
                                        </div>
                                        <span class="svg-icon svg-icon-xl wizard-arrow last">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <rect fill="#000000" opacity="0.3"
                                                            transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                            x="11" y="5" width="2" height="14"
                                                            rx="1"/>
                                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wizard Nav-->
                        </div>
                        <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                            <div class="col-xl-12 col-xxl-7">
                                <!--begin::Form Wizard-->
                                <?php $form = ActiveForm::begin([
                                    'options' => [
                                        'enctype' => 'multipart/form-data',
                                        'class' => 'form',
                                        'id' =>'kt_projects_add_form',
                                    ]
                                ]); ?>
                                <!-- Ariza create start -->
                                    <!--begin::Step 1-->
                                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                        <h3 class="mb-10 font-weight-bold text-dark">Appeal Details:</h3>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Контрагент 
                                                    </label>
                                                    <?= $form->field($appeal, 'status')->hiddenInput(['value'=> Appeal::STATUS_ACTIVE])->label(false); ?>

                                                    <?= $form->field($appeal, 'contragent_id')->hiddenInput(['value'=> $contr_agent->id])->label(false); ?>
                                                    <?= $form->field($appeal, 'status_by')->hiddenInput(['value'=> $contr_agent->id])->label(false); ?>
                                                    <?= $form->field($appeal, 'status_at')->hiddenInput(['value'=> time()])->label(false); ?>

                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                                               value="<?php echo $contr_agent->name ?>" disabled/ >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Статус заявления
                                                    </label>
                                                    <?= $form->field($appeal, 'appeal_status')->hiddenInput(['value'=>AppealStatus::APPEAL_NEW])->label(false); ?>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <select class="form-control form-control-lg form-control-solid"
                                                                disabled>
                                                            <option value="<?php echo AppealStatus::APPEAL_NEW?>"><?php echo AppealStatus::getStatusList()[AppealStatus::APPEAL_NEW]?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Тип заявления
                                                    </label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <?= $form->field($appeal, 'appeal_type')->widget(Select2::class, [
                                                                    'data' => AppealType::getTypeList(),
                                                                    'options' => [
                                                                        'placeholder' => 'Выбирать тип'
                                                                    ],
                                                            ])->label(false) ?>
                                                        <span class="form-text text-muted">Сиз қайси турдаги ариза бермоқчисиз!</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Step 1-->

                                    <!-- Loyiha create start -->

                                    <!--begin::Step 2-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h3 class="kt-section__title kt-section__title-md">
                                                            Project Details
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Контрагент
                                                    </label>
                                                    <?= $form->field($project_subsidy, 'contragent_id')->hiddenInput(['value'=> $contr_agent->id])->label(false); ?>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                                               value="<?php echo $contr_agent->name ?>" disabled/ >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Регионы
                                                    </label>
                                                    <?= $form->field($project_subsidy, 'region_id')->hiddenInput(['value'=> $contr_agent->region_id])->label(false); ?>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                                               value="<?php echo $region ?>" disabled/ >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Район
                                                    </label>
                                                    <?= $form->field($project_subsidy, 'district_id')->hiddenInput(['value'=> $contr_agent->district_id])->label(false); ?>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                                               value="<?php echo $district ?>" disabled/
                                                        >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Сонтур номер
                                                    </label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               name="ProjectSubsidy[contur_number]" type="number"
                                                               placeholder="Contur number"/ >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Сонтур умумий майдони 
                                                    </label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               name="ProjectSubsidy[counter_ga]" type="number"
                                                               placeholder="Сонтур умумий майдони"/ >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Сонтур сув манбалари сони
                                                    </label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               name="ProjectSubsidy[water_pump_count]" type="number"
                                                               placeholder="Сонтур сув манбалари сони "/
                                                        >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Сонтур бонитет балл
                                                    </label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               name="ProjectSubsidy[bonitet_ball]" type="number"
                                                               placeholder="Сонтур бонитет балл"/ >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Плантациянинг умумий
                                                        майдони</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               name="ProjectSubsidy[plant_all_area_ga]" type="number"
                                                               placeholder="Плантациянинг умумий майдони"/ >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               name="ProjectSubsidy[plant_address]" type="hidden"
                                                               value="<?php echo $contr_agent->address ?>"/ >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Плантациянинг
                                                        схемаси</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <?= $form->field($project_subsidy, 'plant_schema_id')->widget(Select2::class, [
                                                                'data' => PlantSchema::getTypeList(),
                                                                'options' => [
                                                                    'placeholder' => 'Выбирать Плантациянинг схемаси'
                                                                ],
                                                        ])->label(false) ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Плантациядаги умумий
                                                        кўчатлар сони:</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               name="ProjectSubsidy[plant_all_count]" type="number"
                                                               placeholder="Плантациядаги умумий кўчатлар сони"/ >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Плантациянинг
                                                        кўчатлар тури:</label>
                                                    <div class="col-lg-7 col-xl-7">
                                                    <?= $form->field($project_subsidy_nav_type, 'nav_type_id')->widget(Select2::class, [
                                                            'data' => NavType::getTypeList(),
                                                            'options' => [
                                                                'placeholder' => 'Выбирать кўчатлар тури',
                                                                'multiple' => true
                                                            ],
                                                    ])->label(false) ?>
                                                    </div>
                                                    <div class="col-lg-2 col-xl-2">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               name="ProjectSubsidyNavType[area_ga]" type="number"
                                                               placeholder="Сони"/ >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Лойиҳани амалга
                                                        ошириш муддати:</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               name="ProjectSubsidy[end_date]" type="text"
                                                               placeholder="(масалан, 2020 йил кузи)"/ >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Яратиладиган иш
                                                        жойи:</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               name="ProjectSubsidy[job_count]" type="number"
                                                               placeholder="Яратиладиган иш уринлари"/ >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Лойиҳанинг умумий
                                                        қиймати:</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               name="ProjectSubsidy[project_all_price]" type="number"
                                                               placeholder="Лойиҳанинг умумий қиймати"/ >
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Step 2-->

                                    <!-- Loyiha work create start  -->

                                    <!--begin::Step 3-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <h3 class="mb-10 font-weight-bold text-dark subsidy-header">
                                            Лойиҳани амалга ошириладиган ишлари ва Молиялаштириш манбалари, млн сўм
                                        </h3>

                                        <div class="row">
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <label class="subsidy-table-header">Амалга ошириладиган ишлар</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <label class="subsidy-table-header">Лойиҳа ташаббускор-ларининг маблағлари</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <label class="subsidy-table-header">Виночиликни ривожлантириш жамғармаси субсидиялари</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <label class="subsidy-table-header">Тижорат банклари кредитлари, жумладан, Жамғарма ресурслари ҳисобига</label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr><br>

                                        <div class="row">
                                            <?= $form->field($project_subsidy_work, 'work_name_1')->hiddenInput(['value'=> 'Агротехник тадбирлар (жумладан, ер ҳайдаш, чизеллаш, ерни текислаш ва ҳоказо ишларни амалга ошириш)'])->label(false); ?>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                <label for="" class="subsidy-work-name">
                                                    1. Агротехник тадбирлар (жумладан, ер ҳайдаш, чизеллаш, ерни текислаш ва ҳоказо ишларни амалга ошириш)
                                                </label>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="ProjectSubsidyWork[self_finance_sum_1]" value="0"/>
                                                    <span class="form-text text-muted">Лойиҳа ташаббускор-ларининг маблағлари</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="ProjectSubsidyWork[subsidy_sum_1]" value="0"/>
                                                    <span class="form-text text-muted">Виночиликни ривожлантириш жамғармаси субсидиялари</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="ProjectSubsidyWork[credit_sum_1]" value="0"/>
                                                    <span class="form-text text-muted">Тижорат банклари кредитлари, жумладан, Жамғарма ресурслари ҳисобига</span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <?= $form->field($project_subsidy_work, 'work_name_2')->hiddenInput(['value'=> 'Тупроққа минерал ўғитлар ва бошқа кимёвий моддалар билан ишлов бериш'])->label(false); ?>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <label for="" class="subsidy-work-name">
                                                        2. Тупроққа минерал ўғитлар ва бошқа кимёвий моддалар билан ишлов бериш
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="ProjectSubsidyWork[self_finance_sum_2]" value="0"/>
                                                    <span class="form-text text-muted">Лойиҳа ташаббускор-ларининг маблағлари</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="ProjectSubsidyWork[subsidy_sum_2]" value="0"/>
                                                    <span class="form-text text-muted">Виночиликни ривожлантириш жамғармаси субсидиялари</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="ProjectSubsidyWork[credit_sum_2]" value="0"/>
                                                    <span class="form-text text-muted">Тижорат банклари кредитлари, жумладан, Жамғарма ресурслари ҳисобига</span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <?= $form->field($project_subsidy_work, 'work_name_3')->hiddenInput(['value'=> 'Саноатбоп узум ниҳолларини харид қилиш ва уларни ўтқазишни ташкил қилиш'])->label(false); ?>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <label for="" class="subsidy-work-name">
                                                        3. Саноатбоп узум ниҳолларини харид қилиш ва уларни ўтқазишни ташкил қилиш
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="ProjectSubsidyWork[self_finance_sum_3]" value="0"/>
                                                    <span class="form-text text-muted">Лойиҳа ташаббускор-ларининг маблағлари</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="ProjectSubsidyWork[subsidy_sum_3]" value="0"/>
                                                    <span class="form-text text-muted">Виночиликни ривожлантириш жамғармаси субсидиялари</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="ProjectSubsidyWork[credit_sum_3]" value="0"/>
                                                    <span class="form-text text-muted">Тижорат банклари кредитлари, жумладан, Жамғарма ресурслари ҳисобига</span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <?= $form->field($project_subsidy_work, 'work_name_4')->hiddenInput(['value'=> 'Сув чиқариш учун бурғилаш қудуқлари қуриш'])->label(false); ?>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <label for="" class="subsidy-work-name">
                                                        4. Сув чиқариш учун бурғилаш қудуқлари қуриш
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="ProjectSubsidyWork[self_finance_sum_4]" value="0"/>
                                                    <span class="form-text text-muted">Лойиҳа ташаббускор-ларининг маблағлари</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="ProjectSubsidyWork[subsidy_sum_4]" value="0"/>
                                                    <span class="form-text text-muted">Виночиликни ривожлантириш жамғармаси субсидиялари</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="ProjectSubsidyWork[credit_sum_4]" value="0"/>
                                                    <span class="form-text text-muted">Тижорат банклари кредитлари, жумладан, Жамғарма ресурслари ҳисобига</span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <?= $form->field($project_subsidy_work, 'work_name_5')->hiddenInput(['value'=> 'Томчилаб суғориш тизимини жорий қилиш'])->label(false); ?>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <label for="" class="subsidy-work-name">
                                                        5. Томчилаб суғориш тизимини жорий қилиш
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="ProjectSubsidyWork[self_finance_sum_5]" value="0"/>
                                                    <span class="form-text text-muted">Лойиҳа ташаббускор-ларининг маблағлари</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="ProjectSubsidyWork[subsidy_sum_5]" value="0"/>
                                                    <span class="form-text text-muted">Виночиликни ривожлантириш жамғармаси субсидиялари</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="ProjectSubsidyWork[credit_sum_5]" value="0"/>
                                                    <span class="form-text text-muted">Тижорат банклари кредитлари, жумладан, Жамғарма ресурслари ҳисобига</span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <?= $form->field($project_subsidy_work, 'work_name_6')->hiddenInput(['value'=> 'Ток кўчатларини шпалерга кўтариш'])->label(false); ?>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <label for="" class="subsidy-work-name">
                                                        6. Ток кўчатларини шпалерга кўтариш
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="ProjectSubsidyWork[self_finance_sum_6]" value="0"/>
                                                    <span class="form-text text-muted">Лойиҳа ташаббускор-ларининг маблағлари</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="ProjectSubsidyWork[subsidy_sum_6]" value="0"/>
                                                    <span class="form-text text-muted">Виночиликни ривожлантириш жамғармаси субсидиялари</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="ProjectSubsidyWork[credit_sum_6]" value="0"/>
                                                    <span class="form-text text-muted">Тижорат банклари кредитлари, жумладан, Жамғарма ресурслари ҳисобига</span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <?= $form->field($project_subsidy_work, 'work_name_7')->hiddenInput(['value'=> 'Бошқа харажатлар'])->label(false); ?>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <label for="" class="subsidy-work-name">
                                                        7. Бошқа харажатлар
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="ProjectSubsidyWork[self_finance_sum_7]" value="0"/>
                                                    <span class="form-text text-muted">Лойиҳа ташаббускор-ларининг маблағлари</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="ProjectSubsidyWork[subsidy_sum_7]" value="0"/>
                                                    <span class="form-text text-muted">Виночиликни ривожлантириш жамғармаси субсидиялари</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="ProjectSubsidyWork[credit_sum_7]" value="0"/>
                                                    <span class="form-text text-muted">Тижорат банклари кредитлари, жумладан, Жамғарма ресурслари ҳисобига</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--end::Step 3-->

                                    <!-- Ariza va Loyiha kurinishi -->

                                    <!--begin::Step 4-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <h3 class="mb-10 font-weight-bold text-dark subsidy-header">
                                            Аризага қуйидаги ҳужжатлар илова қилинади:
                                        </h3>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <label class="col-xl-9 col-lg-9 col-form-label ariza-hujjat-title">
                                                        1.	Лойиҳа тўғрисида маълумот:
                                                    </label>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <?= $form->field($attachment, 'file_1')->fileInput()->label(false) ?>
                                                    </div>
                                                    <input type="hidden" name="AppealAttachment[type_1]" value="1">
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-9 col-lg-9 col-form-label ariza-hujjat-title">
                                                        2.	Ер ажратиш тўғрисида туман ҳокимининг қарори ва харитаси нусхаси:
                                                    </label>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <?= $form->field($attachment, 'file_2')->fileInput()->label(false) ?>
                                                    </div>
                                                    <input type="hidden" name="AppealAttachment[type_2]" value="2">

                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-9 col-lg-9 col-form-label ariza-hujjat-title">
                                                        3.	Ер участкасига бўлган ижара шартномаси нусхаси:
                                                    </label>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <?= $form->field($attachment, 'file_3')->fileInput()->label(false) ?>
                                                    </div>
                                                    <input type="hidden" name="AppealAttachment[type_3]" value="3">

                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-9 col-lg-9 col-form-label ariza-hujjat-title">
                                                        4.	Ер балл бонитет бўйича кадастр маълумотномаси нусхаси:
                                                    </label>
                                                    <div class="col-lg-3 col-xl-3">
                                                        <?= $form->field($attachment, 'file_4')->fileInput()->label(false) ?>
                                                    </div>
                                                    <input type="hidden" name="AppealAttachment[type_4]" value="4">

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--end::Step 4-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        <div class="mr-2">
                                            <button class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4"
                                                    data-wizard-type="action-prev">Previous
                                            </button>
                                        </div>
                                        <div>
                                            <button class="btn btn-success font-weight-bold text-uppercase px-9 py-4"
                                                    data-wizard-type="action-submit" type="submit">Save
                                            </button>
                                            <button class="btn btn-primary font-weight-bold text-uppercase px-9 py-4"
                                                    data-wizard-type="action-next">Next Step
                                            </button>
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
</div>
<!--end::Content-->
