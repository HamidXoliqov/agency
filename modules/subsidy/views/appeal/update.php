<?php

use app\models\Attachment;
use app\modules\manuals\models\AppealStatus;
use app\modules\manuals\models\AppealType;
use app\modules\manuals\models\MysoliqDistrict;
use app\modules\manuals\models\MysoliqRegion;
use app\modules\manuals\models\NavType;
use app\modules\manuals\models\PlantSchema;
use app\modules\subsidy\models\Appeal;
use app\modules\subsidy\models\ProjectSubsidyNavType;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\subsidy\models\Appeal */

$this->title = Yii::t('app', 'Update Appeal');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appeals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');

\yii\web\YiiAsset::register($this);

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
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-body">
                <div class="d-flex">
                    <!--begin: Info-->
                    <div class="flex-grow-1">
                        <!--begin: Title-->
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <div class="mr-3">
                                <!--begin::Name-->
                                <a href="<?php echo Url::to('/') ?>" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3" style="justify-content: center;">
                                    <?php echo $contr_agent->name ?>
                                    <i class="flaticon2-correct text-success icon-md ml-2"></i>
                                </a><!--end::Name-->
                                <!--begin::Contacts-->
                                <div class="d-flex flex-wrap my-2">
                                    <a href="tel:<?= $contr_agent->tel ?>" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                        <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                            <span class="flaticon2-phone"></span>
                                        </span>
                                        <?= $contr_agent->tel ?>
                                    </a>
                                    <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                        <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Lock.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <mask fill="white">
                                                        <use xlink:href="#path-1" />
                                                    </mask>
                                                    <g />
                                                    <path d="M7,10 L7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 L17,10 L18,10 C19.1045695,10 20,10.8954305 20,12 L20,18 C20,19.1045695 19.1045695,20 18,20 L6,20 C4.8954305,20 4,19.1045695 4,18 L4,12 C4,10.8954305 4.8954305,10 6,10 L7,10 Z M12,5 C10.3431458,5 9,6.34314575 9,8 L9,10 L15,10 L15,8 C15,6.34314575 13.6568542,5 12,5 Z" fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <?= $contr_agent->director ?>
                                    </a>
                                    <a href="#" class="text-muted text-hover-primary font-weight-bold">
                                        <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Map/Marker2.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z" fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <?= $contr_agent->address ?>
                                    </a>
                                </div>
                                <!--end::Contacts-->
                            </div>
                        </div>
                        <!--end: Title-->
                    </div>
                    <!--end: Info-->
                </div>
                <div class="separator separator-solid my-7"></div>
                <!--begin: Items-->
                <div class="d-flex align-items-center flex-wrap">
                    <!--begin: Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                        <span class="mr-4">
                            <i class="flaticon-piggy-bank icon-2x text-muted font-weight-bold"></i>
                        </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm"  data-container="body" data-toggle="popover" data-placement="top" data-content="Лойиҳанинг умумий қиймати">Лойиҳа қиймати</span>
                            <span class="font-weight-bolder font-size-h5">
                                <span class="text-dark-50 font-weight-bold">
                                </span>
                                <?= number_format($project_subsidy->project_all_price, 2, '.', ' ') ?> млн сўм
                            </span>
                        </div>
                    </div>
                    <!--end: Item-->
                    <!--begin: Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                        <span class="mr-4">
                            <i class="flaticon-confetti icon-2x text-muted font-weight-bold"></i>
                        </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm" data-container="body" data-toggle="popover" data-placement="top" data-content="Яратиладиган саноатбоп узум плантацияларининг умумий майдони">Умумий майдони</span>
                            <span class="font-weight-bolder font-size-h5">
                                <span class="text-dark-50 font-weight-bold">
                                </span>
                                <?= number_format($project_subsidy->counter_ga, 0, '', ' ') . ' ' ?> га
                            </span>
                        </div>
                    </div>
                    <!--end: Item-->
                    <!--begin: Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                        <span class="mr-4">
                            <i class="flaticon-pie-chart icon-2x text-muted font-weight-bold"></i>
                        </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm" data-container="body" data-toggle="popover" data-placement="top" data-content="Яратиладиган иш жойи">Иш жойи</span>
                            <span class="font-weight-bolder font-size-h5">
                                <span class="text-dark-50 font-weight-bold">
                                </span>
                                <?= number_format($project_subsidy->job_count, 0, '', ' ') . ' ' ?> киши
                            </span>
                        </div>
                    </div>
                    <!--end: Item-->
                    <!--begin: Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                    <span class="mr-4">
                            <i class="flaticon-calendar-3 icon-2x text-muted font-weight-bold"></i>
                        </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm" data-container="body" data-toggle="popover" data-placement="top" data-content="Лойиҳани амалга ошириш муддати">Лойиҳа муддати</span>
                            <span class="font-weight-bolder font-size-h5">
                                <?= $project_subsidy->end_date ?></span>
                        </div>
                    </div>
                    <!--end: Item-->
                </div>
                <!--begin: Items-->
            </div>
        </div>
        <!--end::Card-->
        <!--begin::Card-->
        <div class="card card-custom gutter-bs">
            <!--begin::Header-->
            <div class="card-header card-header-tabs-line">
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x" role="tablist">
                        <li class="nav-item mr-3">
                            <a class="nav-link active" data-toggle="tab" href="#kt_apps_projects_view_tab_2" id="display_none_1">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
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
                                </span>
                                <span class="nav-text font-weight-bold">Appeal Details</span>
                            </a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_apps_projects_view_tab_3" id="display_none_2">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
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
                                </span>
                                <span class="nav-text font-weight-bold">Project Details</span>
                            </a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_apps_projects_view_tab_4" id="display_none_3">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Globe.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z" fill="#000000" fill-rule="nonzero" />
                                                <circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-weight-bold">Project work Details</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_apps_projects_view_tab_1" id="click_button">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
                                                <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-weight-bold">Appeal file and save</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <?php $form = ActiveForm::begin([
                'options' => [
                    'enctype' => 'multipart/form-data',
                    'class' => 'form',
                    'id' =>'kt_projects_add_form',
                ]
            ]); ?>
            <div class="card-body px-0">
                <div class="tab-content pt-5">
                
                    <!--begin::Tab Content-->
                    <div class="tab-pane active" id="kt_apps_projects_view_tab_2" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-9 col-xl-6 offset-xl-3">
                                <h3 class="font-size-h6 mb-5">Appeal Details:</h3>
                            </div>
                        </div>
                        <?= $form->field($appeal, 'status')->hiddenInput(['value'=> Appeal::STATUS_ACTIVE])->label(false); ?>
                        <?= $form->field($appeal, 'contragent_id')->hiddenInput(['value'=> $contr_agent->id])->label(false); ?>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">
                                Контрагент
                            </label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                        value="<?php echo $contr_agent->name ?>" disabled/ >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">
                                Статус заявления
                            </label>
                            <?= $form->field($appeal, 'appeal_status')->hiddenInput(['value'=>$appeal->appeal_status])->label(false); ?>
                            <div class="col-lg-9 col-xl-6">
                                <select class="form-control form-control-lg form-control-solid" disabled>
                                    <option value="<?php echo $appeal->appeal_status?>"><?php echo AppealStatus::getStatusList()[$appeal->appeal_status]?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">
                                Тип заявления
                            </label>
                            <div class="col-lg-9 col-xl-6">
                                <select class="form-control form-control-lg form-control-solid" disabled>
                                    <option value="<?php echo $appeal->appeal_type?>"><?php echo AppealType::getTypeList()[$appeal->appeal_type]?></option>
                                </select>
                                <span class="form-text text-muted">Сиз қайси турдаги ариза бермоқчисиз!</span>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-10"></div>
                    </div>
                    <!--end::Tab Content-->
                    <!--begin::Tab Content-->
                    <div class="tab-pane" id="kt_apps_projects_view_tab_3" role="tabpanel">
                        <!--begin::Heading-->
                        <div class="row">
                            <div class="col-lg-9 col-xl-6 offset-xl-3">
                                <h3 class="font-size-h6 mb-5">Project Details:</h3>
                            </div>
                        </div>
                        <!--end::Heading-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">
                                Контрагент
                            </label>
                            <?= $form->field($project_subsidy, 'contragent_id')->hiddenInput(['value'=> $contr_agent->id])->label(false); ?>
                            <div class="col-lg-9 col-xl-6">
                                <div class="kt-spinner kt-spinner--sm kt-spinner--success kt-spinner--right kt-spinner--input">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                    value="<?php echo $contr_agent->name ?>" disabled/ >
                                </div>
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">
                                Регионы
                            </label>
                            <?= $form->field($project_subsidy, 'region_id')->hiddenInput(['value'=> $contr_agent->region_id])->label(false); ?>
                            <div class="col-lg-9 col-xl-6">
                                <div class="kt-spinner kt-spinner--sm kt-spinner--success kt-spinner--right kt-spinner--input">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                    value="<?php echo $region ?>" disabled/ >
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">
                                Район
                            </label>
                            <?= $form->field($project_subsidy, 'district_id')->hiddenInput(['value'=> $contr_agent->district_id])->label(false); ?>
                            <div class="col-lg-9 col-xl-6">
                                <div class="kt-spinner kt-spinner--sm kt-spinner--success kt-spinner--right kt-spinner--input">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                        value="<?php echo $district ?>" disabled/
                                >
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">
                                Сонтур номер
                            </label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="kt-spinner kt-spinner--sm kt-spinner--success kt-spinner--right kt-spinner--input">
                                <?= $form->field($project_subsidy, 'contur_number')->textInput(['type' => 'number','class' => 'form-control form-control-lg form-control-solid','placeholder'=>'Сонтур номер'])->label(false); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">
                                Сонтур умумий майдони 
                            </label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="kt-spinner kt-spinner--sm kt-spinner--success kt-spinner--right kt-spinner--input">
                                <?= $form->field($project_subsidy, 'counter_ga')->textInput(['type' => 'number','class' => 'form-control form-control-lg form-control-solid','placeholder'=>'Сонтур умумий майдони'])->label(false); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">
                                Сонтур сув манбалари сони
                            </label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="kt-spinner kt-spinner--sm kt-spinner--success kt-spinner--right kt-spinner--input">
                                <?= $form->field($project_subsidy, 'water_pump_count')->textInput(['type' => 'number','class' => 'form-control form-control-lg form-control-solid','placeholder'=>'Сонтур сув манбалари сони'])->label(false); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">
                                Сонтур бонитет балл
                            </label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="kt-spinner kt-spinner--sm kt-spinner--success kt-spinner--right kt-spinner--input">
                                <?= $form->field($project_subsidy, 'bonitet_ball')->textInput(['type' => 'number','class' => 'form-control form-control-lg form-control-solid','placeholder'=>'Сонтур бонитет балл'])->label(false); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">
                                Плантациянинг умумий майдони
                            </label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="kt-spinner kt-spinner--sm kt-spinner--success kt-spinner--right kt-spinner--input">
                                <?= $form->field($project_subsidy, 'plant_all_area_ga')->textInput(['type' => 'number','class' => 'form-control form-control-lg form-control-solid','placeholder'=>'Плантациянинг умумий майдони'])->label(false); ?>
                                </div>
                            </div>
                        </div>
                        <?= $form->field($project_subsidy, 'plant_address')->hiddenInput(['value'=> $contr_agent->address])->label(false); ?>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">
                                Плантациянинг схемаси
                            </label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="kt-spinner kt-spinner--sm kt-spinner--success kt-spinner--right kt-spinner--input">
                                <?= $form->field($project_subsidy, 'plant_schema_id')->widget(Select2::class, [
                                        'data' => PlantSchema::getTypeList(),
                                        'class' => 'form-control form-control-lg form-control-solid',
                                        'options' => [
                                            'placeholder' => 'Выбирать Плантациянинг схемаси'
                                        ],
                                ])->label(false) ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">
                                Плантациядаги умумий кўчатлар сони
                            </label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="kt-spinner kt-spinner--sm kt-spinner--success kt-spinner--right kt-spinner--input">
                                <?= $form->field($project_subsidy, 'plant_all_count')->textInput(['type' => 'number','class' => 'form-control form-control-lg form-control-solid','placeholder'=>'Плантациядаги умумий кўчатлар сони'])->label(false); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">
                                Плантациянинг кўчатлар тури
                            </label>
                            <div class="col-lg-7 col-xl-4">
                                <div class="kt-spinner kt-spinner--sm kt-spinner--success kt-spinner--right kt-spinner--input">
                                <?= $form->field($project_subsidy_nav_type, 'nav_type_id')->widget(Select2::classname(), [
                                        'data' => NavType::getTypeList(),
                                        'options' => [
                                            'placeholder' => 'Выбирать кўчатлар тури'
                                        ],
                                        'pluginOptions' => [
                                            'tags' => $row,
                                            'allowClear' => true,
                                            'multiple' => true
                                        ],
                                ])->label(false) ?>
                                </div>
                            </div>
                            <div class="col-lg-2 col-xl-2">
                                <?= $form->field($project_subsidy_nav_type, 'area_ga')->textInput(['type' => 'number','class' => 'form-control form-control-lg form-control-solid','placeholder'=>'Плантациядаги умумий кўчатлар сони'])->label(false); ?>
                                <span class="form-text text-muted">Неча гектар ?</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">
                                Лойиҳани амалга ошириш муддати
                            </label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="kt-spinner kt-spinner--sm kt-spinner--success kt-spinner--right kt-spinner--input">
                                <?= $form->field($project_subsidy, 'end_date')->textInput(['class' => 'form-control form-control-lg form-control-solid','placeholder'=>'(масалан, 2020 йил кузи)'])->label(false); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">
                                Яратиладиган иш уринлари сони
                            </label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="kt-spinner kt-spinner--sm kt-spinner--success kt-spinner--right kt-spinner--input">
                                <?= $form->field($project_subsidy, 'job_count')->textInput(['type' => 'number','class' => 'form-control form-control-lg form-control-solid','placeholder'=>'Яратиладиган иш уринлари сони'])->label(false); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">
                                Лойиҳанинг умумий қиймати
                            </label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="kt-spinner kt-spinner--sm kt-spinner--success kt-spinner--right kt-spinner--input">
                                <?= $form->field($project_subsidy, 'project_all_price')->textInput(['type' => 'number','class' => 'form-control form-control-lg form-control-solid','placeholder'=>'Лойиҳанинг умумий қиймати'])->label(false); ?>
                                <span class="form-text text-muted">млн сўмда</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Tab Content-->
                    <!--begin::Tab Content-->
                    <div class="tab-pane" id="kt_apps_projects_view_tab_4" role="tabpanel">
                        <div class="pb-5" style="margin: 10px;">
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
                            <?php foreach($project_subsidy_work as $key=>$value): 
                                $self_finance_sum = 'self_finance_sum_'.($key+1); 
                                $subsidy_sum = 'subsidy_sum_'.($key+1);
                                $credit_sum = 'credit_sum_'.($key+1);
                            ?>
                                <div class="row">
                                    <?//= $form->field($project_subsidy_work, 'work_name_1')->hiddenInput(['value'=> 'Агротехник тадбирлар (жумладан, ер ҳайдаш, чизеллаш, ерни текислаш ва ҳоказо ишларни амалга ошириш)'])->label(false); ?>
                                    <div class="col-xl-3">
                                        <div class="form-group">
                                        <label for="" class="subsidy-work-name">
                                            <?=($key+1).'. '. $value->work_name?>
                                        </label>                                            
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="form-group">
                                            <input type="text"
                                                    class="form-control form-control-lg form-control-solid"
                                                    name="ProjectSubsidyWork[<?=$self_finance_sum?>]" value="<?=$value->self_finance_sum?>"/>
                                            <span class="form-text text-muted">Лойиҳа ташаббускор-ларининг маблағлари</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="form-group">
                                            <input type="text"
                                                    class="form-control form-control-lg form-control-solid"
                                                    name="ProjectSubsidyWork[<?=$subsidy_sum?>]" value="<?=$value->subsidy_sum?>"/>
                                            <span class="form-text text-muted">Виночиликни ривожлантириш жамғармаси субсидиялари</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="form-group">
                                            <input type="text"
                                                    class="form-control form-control-lg form-control-solid"
                                                    name="ProjectSubsidyWork[<?=$credit_sum?>]" value="<?=$value->credit_sum?>"/>
                                            <span class="form-text text-muted">Тижорат банклари кредитлари, жумладан, Жамғарма ресурслари ҳисобига</span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            <?php endforeach?>
                        </div>
                    </div>
                    <!--end::Tab Content-->
                    <!--begin::Tab Content-->
                    <div class="tab-pane" id="kt_apps_projects_view_tab_1" role="tabpanel">
                        <div class="container">
                            <h3 class="mb-10 font-weight-bold text-dark subsidy-header">
                                Аризага қуйидаги ҳужжатлар илова қилинади:
                            </h3>
                            <div class="row">
                                <div class="col-xl-12">
                                    <?php foreach($appeal_attachment as $key=>$value): $file[$key+1] = 'file_'.($key+1); $type[$key+1] = 'type_'.($key+1);?>
                                        <div class="form-group row">
                                            <label class="col-xl-8 col-lg-8 col-form-label ariza-hujjat-title">
                                                <?php switch ($key+1) {
                                                    case '1':
                                                        echo '1.  Лойиҳа тўғрисида маълумот:';
                                                        break;
                                                    case '2':
                                                        echo '2.  Ер ажратиш тўғрисида туман ҳокимининг қарори ва харитаси нусхаси:';
                                                        break;                                                    
                                                    case '3':
                                                        echo '3.  Ер участкасига бўлган ижара шартномаси нусхаси:';
                                                        break;
                                                    case '4':
                                                        echo '4.  Ер балл бонитет бўйича кадастр маълумотномаси нусхаси:';
                                                        break;
                                                    default:
                                                        # code...
                                                        break;
                                                }?>
                                            </label>
                                            <div class="col-lg-4 col-xl-4" style="display: flex;">
                                                <?php if ($value->attachment_id): $path = Attachment::getUpload($value->attachment_id);?>
                                                    <a href="<?=Url::to('/').$path?>" target="_blank" class="btn btn-outline-primary btn-xs" title="Есть файл" style="margin-right: 10px;max-height: 23px;">
                                                        <i class="la la-check ml-1"></i>
                                                    </a>
                                                <?php else:?>
                                                    <a href="#" class="btn btn-outline-danger btn-xs" title="Нет файл" style="margin-right: 10px;max-height: 23px;">
                                                        <i class="la la-close ml-1"></i>
                                                    </a>
                                                <?php endif?>
                                                <?= $form->field($attachment, $file[$key+1])->fileInput()->label(false); ?>
                                                <input type="hidden" name="AppealAttachment[<?=$type[$key+1]?>]" value="<?=($key+1)?>">
                                            
                                            </div>                                            
                                        </div>
                                    <?php endforeach?>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-10"></div>
                        </div>
                    </div>
                    <!--end::Tab Content-->
                    <button class="btn btn-success font-weight-bold text-uppercase px-9 py-4 float-right"
                        data-wizard-type="action-submit" type="submit" style="margin: 0 20px 10px 0; display:none">Save
                    </button>
                </div>
                
            </div>
            <!--end::Body-->
            <?php ActiveForm::end(); ?>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->

<?php
$this->registerJs("
    $( document ).ready(function() {
        $('#click_button').click(function(e) {   
            $('.btn-success').css('display','block')
        });
        $('#display_none_1').click(function(e) {   
            $('.btn-success').css('display','none')
        });
        $('#display_none_2').click(function(e) {   
            $('.btn-success').css('display','none')
        });
        $('#display_none_3').click(function(e) {   
            $('.btn-success').css('display','none')
        });
    });
");

?>