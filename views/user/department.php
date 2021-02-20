<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\models\Users;
use app\modules\manuals\models\Contragent;

/* @var $this yii\web\View */
/* @var $user app\modules\admin\models\Users */

$this->title = Yii::t('app', 'Department');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$department = $user->employee->department;
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">

    <div class="container px-0">
        <!--begin::Card-->
        <div class="card card-custom">
            <!--begin::Card header-->
                <div class="card-header card-header-tabs-line">
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                            <!--begin::Item-->
                            <li class="nav-item mr-3">
                                <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1">
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
                                    <span class="nav-text"><?=Yii::t('app', 'Department');?></span>
                                </a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="nav-item mr-3">
                                <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_2">
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
                                    <span class="nav-text"><?=Yii::t('app', 'Contragent');?></span>
                                </a>
                            </li>
                            <!--end::Item-->
                        </ul>
                    </div>
                </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body px-0">
                <form class="form" id="kt_form">
                    <div class="tab-content">
                        <!--begin::Tab-->
                        <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                            <!--begin::Row-->
                            <div class="row">
                                <div class="col-xl-12 my-2 p-5 border-lg rounded bg-light">
                                    <div class="card-label font-weight-bolder mb-5 text-dark">
                                        <div class="font-weight-bolder lead">
                                            <?=Yii::t('app', 'Department');?>
                                        </div>
                                        <div class="form-text text-muted"><?=Yii::t('app', 'You can change some of your data');?>.</div>
                                    </div>
                                    <div class="card card-custom">
                                        <div class="card-header border-bottom-0 mb-0 pb-1 card-header-right ribbon ribbon-clip ribbon-left">
                                            <div class="ribbon-target" style="top: 12px;">
                                            <span class="ribbon-inner bg-Primary"></span><?=Yii::t('app', 'Name Uz');?></div>
                                            <span class="lead"><?=$department->name_uz;?></span>
                                        </div>
                                        <div class="card-body text-right mt-0 mb-0 py-0"></div>
                                    </div>
                                    <div class="card card-custom mt-2">
                                        <div class="card-header border-bottom-0 mb-0 pb-1 card-header-right ribbon ribbon-clip ribbon-left">
                                            <div class="ribbon-target" style="top: 12px;">
                                            <span class="ribbon-inner bg-info"></span><?=Yii::t('app', 'Name Ru');?></div>
                                            <span class="lead"><?=$department->name_ru;?></span>
                                        </div>
                                        <div class="card-body text-right mt-0 mb-0 py-0"></div>
                                    </div>
                                    <div class="card card-custom mt-2">
                                        <div class="card-header border-bottom-0 mb-0 pb-1 card-header-right ribbon ribbon-clip ribbon-left">
                                            <div class="ribbon-target" style="top: 12px;">
                                            <span class="ribbon-inner bg-success"></span><?=Yii::t('app', 'Name En');?></div>
                                            <span class="lead"><?=$department->name_en;?></span>
                                        </div>
                                        <div class="card-body text-right mt-0 mb-0 py-0"></div>
                                    </div>
                                    <div class="card card-custom mt-2">
                                        <div class="card-header border-bottom-0 mb-0 pb-1 card-header-right ribbon ribbon-clip ribbon-left">
                                            <div class="ribbon-target" style="top: 12px;">
                                            <span class="ribbon-inner bg-warning"></span><?=Yii::t('app', 'Short Name');?></div>
                                            <span class="lead"><?=$department->short_name;?></span>
                                        </div>
                                        <div class="card-body text-right mt-0 mb-0 py-0"></div>
                                    </div>
                                    <div class="card card-custom mt-2">
                                        <div class="card-header border-bottom-0 mb-0 pb-1 card-header-right ribbon ribbon-clip ribbon-left">
                                            <div class="ribbon-target" style="top: 12px;">
                                            <span class="ribbon-inner bg-warning"></span><?=Yii::t('app', 'Okonx');?></div>
                                            <span class="lead"><?=$department->okonx;?></span>
                                        </div>
                                        <div class="card-body text-right mt-0 mb-0 py-0"></div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Tab-->
                        <!--begin::Tab-->
                        <div class="tab-pane px-7" id="kt_user_edit_tab_2" role="tabpanel">
                            <!--begin::Row-->
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="row px-0">
                                        <!--begin-->
                                        <div class="form-group col-12 row mb-10">
                                            <label class="col-form-label col-2 text-lg-right text-left"><?=Yii::t('app', 'Contragent');?>:</label>
                                            <div class="col-7">
                                                <div class="checkbox-single">
                                                    <label class="pt-1">
                                                        <span><i class="la la-file-text"></i></span>
                                                        <?=Yii::t('app', 'General information about the contragent');?>.
                                                    </label>
                                                </div>
                                                <div class="form-text text-muted"><?=Yii::t('app', 'Personal data, tax information and passport data of the employee');?>.</div>
                                            </div>
                                            <div class="col-3">
                                                <p class="text-right">
                                                    <?= Html::a(Yii::t('app', 'Update'), ['update-user-contr', 'id' => $contragent->department_id], ['class' => 'btn btn-primary']) ?>
                                                </p>
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                        <div class="my-2 mx-0 col-md-6">
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-2 text-lg-right text-left"><?=Yii::t('app', 'Name');?></label>
                                                <div class="col-10">
                                                    <div class="">
                                                        <input data-container="body" data-toggle="popover" data-placement="top" data-content='<?=$contragent->name?>' readonly class="form-control form-control-lg form-control-solid" type="text" value='<?=$contragent->name?>' />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-2 py-1 text-lg-right text-left"><?=Yii::t('app', 'Short Name');?></label>
                                                <div class="col-10">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <input type="text" readonly class="form-control form-control-lg form-control-solid" value='<?=$contragent->short_name?>' />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-2 py-1 text-lg-right text-left"><?=Yii::t('app', 'Region ID');?></label>
                                                <div class="col-10">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$region_name?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-2 text-lg-right text-left"><?=Yii::t('app', 'District ID');?></label>
                                                <div class="col-10">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$district_name?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-2 text-lg-right text-left"><?=Yii::t('app', 'Oked');?></label>
                                                <div class="col-10">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$contragent->oked?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                        </div>
                                        <div class="mx-0 col-md-6">
                                            <!--begin::Group-->
                                            <div style="margin-top: -20px" class="form-group row align-items-center">
                                                <label class="col-form-label col-7 my-0 py-0 text-lg-right text-left"><?=Yii::t('app', 'Status');?></label>
                                                <div class="col-5">
                                                    <div class="checkbox-inline">
                                                        <label class="checkbox">
                                                        <input type="checkbox" disabled="disabled" <?=($contragent->status == 1) ? 'checked' : '' ?> /><i class="text-<?=($contragent->status == 1) ? 'dark' : '' ?>"><?=Yii::t('app', 'Active');?></i>
                                                        <span></span></label>
                                                        <label class="checkbox">
                                                        <input type="checkbox" disabled="disabled" <?=($contragent->status == 4) ? 'checked' : '' ?> /><i class="text-<?=($contragent->status == 4) ? 'dark' : '' ?>"><?=Yii::t('app', 'Deleted');?></i>
                                                        <span></span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <div class="form-text text-muted mt-5 mb-2 text-center"><?=Yii::t('app', 'Directors data');?>.</div>
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-2 text-lg-right text-left"><?=Yii::t('app', 'Director');?></label>
                                                <div class="col-10">
                                                    <div class="form-control form-control-lg text-left form-control-solid">
                                                        <?=$contragent->director?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label style="font-size: 11px" class="col-form-label col-2 py-1 text-lg-right text-left"><?=Yii::t('app', 'Tel');?></label>
                                                <div class="col-5">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="la la-phone"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-lg form-control-solid" readonly value="<?=$contragent->tel?>" placeholder="Phone" />
                                                    </div>
                                                </div>
                                                <label style="font-size: 11px" class="col-form-label col-2 text-lg-right text-left"><?=Yii::t('app', 'Inn');?></label>
                                                <div class="col-3">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <input type="text" class="form-control form-control-lg form-control-solid" readonly value="<?=$contragent->inn?>" placeholder="Phone" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <div class="form-text text-muted mb-2 mt-4 text-center"><?=Yii::t('app', 'Accounters data');?>.</div>
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-2 text-lg-right text-left"><?=Yii::t('app', 'Accounter');?></label>
                                                <div class="col-10">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$contragent->accounter?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label style="font-size: 11px" class="col-form-label col-2 py-1 text-lg-right text-left"><?=Yii::t('app', 'Accounter Tel');?></label>
                                                <div class="col-5">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="la la-phone"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-lg form-control-solid" readonly value="<?=$contragent->accounter_tel?>" placeholder="Phone" />
                                                    </div>
                                                </div>
                                                <label style="font-size: 11px" class="col-form-label col-2 py-1 text-lg-right text-left"><?=Yii::t('app', 'Accounter Inn');?></label>
                                                <div class="col-3">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <input type="text" class="form-control form-control-lg form-control-solid" readonly value="<?=$contragent->accounter_inn?>" placeholder="Phone" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                        </div>
                                        <div class="col-md-12">
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-2 col-md-1 text-lg-right text-left"><?=Yii::t('app', 'Address');?></label>
                                                <div class="col-10 col-md-11">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$contragent->address?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                        </div>
                                        <?php if ($contragent->add_info != ''): ?>
                                            <div class="col-md-12">
                                                <!--begin::Group-->
                                                <div class="form-group row">
                                                    <label class="col-form-label col-2 py-1 col-md-1 text-lg-right text-left"><?=Yii::t('app', 'Add Info');?></label>
                                                    <div class="col-10 col-md-11">
                                                        <div class="">
                                                            <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$contragent->add_info?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Group-->
                                            </div>
                                        <?php endif ?>
                                        <div class="col-md-12">
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-2 col-md-1 text-lg-right text-left"><?=Yii::t('app', 'Bank');?></label>
                                                <div class="col-10 col-md-11">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value='<?php echo $contragent->bank;?>' />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                        </div>
                                        <div class="my-2 mx-0 col-md-12">
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-1 text-lg-right text-left"><?=Yii::t('app', 'Fond');?></label>
                                                <div class="col-3">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <input type="text" readonly class="form-control form-control-lg form-control-solid" value="<?=$contragent->fund?>" />
                                                    </div>
                                                </div>
                                                <label class="col-form-label col-2 text-lg-right text-left"><?=Yii::t('app', 'Bank Account Number');?></label>
                                                <div class="col-3">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$contragent->bank_account_number?>" />
                                                    </div>
                                                </div>
                                                <label class="col-form-label col-1 text-lg-right text-left"><?=Yii::t('app', 'Bank Code');?></label>
                                                <div class="col-2">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <input type="text" readonly class="form-control form-control-lg form-control-solid" value="<?=$contragent->bank_code?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->

                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-right text-left"><?=Yii::t('app', 'Ns3 Name');?></label>
                                                <div class="col-9">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$contragent->ns3Name?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-right text-left"><?=Yii::t('app', 'Nc1 Name');?></label>
                                                <div class="col-9">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <input type="text" readonly class="form-control form-control-lg form-control-solid" value="<?=$contragent->nc1Name?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-right text-left"><?=Yii::t('app', 'Ns1 Name');?></label>
                                                <div class="col-2">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$contragent->ns1Name?>" />
                                                    </div>
                                                </div>
                                                <label class="col-form-label col-3 text-lg-right text-left"><?=Yii::t('app', 'Nc2 Name');?></label>
                                                <div class="col-4">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <input type="text" readonly class="form-control form-control-lg form-control-solid" value="<?=$contragent->nc2Name?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-right text-left"><?=Yii::t('app', 'Nc5 Name');?></label>
                                                <div class="col-3">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$contragent->nc5Name?>" />
                                                    </div>
                                                </div>
                                                <label class="col-form-label col-2 py-1 text-lg-right text-left"><?=Yii::t('app', 'Nc4 Name');?></label>
                                                <div class="col-4">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <input type="text" readonly class="form-control form-control-lg form-control-solid" value="<?=$contragent->nc4Name?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-right text-left"><?=Yii::t('app', 'Nc6 Name');?></label>
                                                <div class="col-9">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$contragent->nc6Name?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-right text-left"><?=Yii::t('app', 'Nc3 Name');?></label>
                                                <div class="col-9">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$contragent->nc3Name?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-3 py-1 text-lg-right text-left"><?=Yii::t('app', 'Ns4 Name');?></label>
                                                <div class="col-3">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$contragent->ns4Name?>" />
                                                    </div>
                                                </div>
                                                <label class="col-form-label col-3 py-1 text-lg-right text-left"><?=Yii::t('app', 'Na1 Name');?></label>
                                                <div class="col-3">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$contragent->na1Name?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-3 py-1 text-lg-right text-left"><?=Yii::t('app', 'Ns13 Name');?></label>
                                                <div class="col-9">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$contragent->ns13Name?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-3 text-lg-right text-left"><?=Yii::t('app', 'State Name');?></label>
                                                <div class="col-9">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$contragent->stateName?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                
                                                <!-- <label class="col-form-label col-1 text-lg-right text-left"><?=Yii::t('app', 'Duty');?></label>
                                                <div class="col-2">
                                                    <span class="btn btn-<?php echo ($user->employee->duty == 0) ? 'success' : 'danger';?>">
                                                        <?php echo ($user->employee->duty == 0) ? Yii::t('app', 'Not In Debt') : Yii::t('app', 'Debtor');?>        
                                                    </span>
                                                </div> -->
                                            </div>
                                            <!--end::Group-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Tab-->
                    </div>
                </form>
            </div>
            <!--begin::Card body-->
        </div>
        <!--end::Card-->
    </div>
</div>

<?php
$css = <<<CSS
.rounded .card.card-custom:hover {
    background-color: #ddd;
}
.rounded .card.card-custom:hover .ribbon-target{
    box-shadow: 1px 2px 3px #666;
}
.popover{
    max-width: 75%; /* Max Width of the popover (depending on the container!) */
    font-size: 14px;
}
CSS;
$this->registerCss($css);
?>