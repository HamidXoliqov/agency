<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\models\Users;
use app\modules\manuals\models\Contragent;

/* @var $this yii\web\View */
/* @var $user app\modules\admin\models\Users */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'My page'), 'url' => ['mypage']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom">
            <!--begin::Card header-->
            <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                <!--begin::Toolbar-->
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                                <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg"><?=Yii::t('app', 'User');?></span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_2">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg"><?=Yii::t('app', 'Employee');?></span>
                            </a>
                        </li>
                        <!--end::Item-->
                    </ul>
                </div>
                <!--end::Toolbar-->
                <p class="mt-5">
                    <?= Html::a(Yii::t('app', 'Update'), ['update-self', 'id' => $user->employee_id], ['class' => 'btn btn-primary']) ?>
                </p>
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
                                <div class="col-xl-2"></div>
                                <div class="col-xl-7 my-2">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <div class="col-1"></div>
                                        <div class="form-group col-11 row mb-10">
                                            <label class="col-form-label col-3 text-lg-right text-left"><?=Yii::t('app', 'User');?>:</label>
                                            <div class="col-8">
                                                <div class="checkbox-single">
                                                    <label class="pt-1">
                                                        <span><i class="la la-file-text"></i></span>
                                                        <?=Yii::t('app', 'Information about the user');?>.
                                                    </label>
                                                </div>
                                                <div class="form-text text-muted"><?=Yii::t('app', 'You can change some of your data');?>.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left"><?=Yii::t('app', 'User');?></label>
                                        <div class="col-9">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-user"></i>
                                                    </span>
                                                </div>
                                                <input class="form-control form-control-lg form-control-solid" type="text" readonly value="<?=$user->employee->fullName?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Group-->
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left"><?=Yii::t('app', 'Username');?></label>
                                        <div class="col-9">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-unlock"></i>
                                                    </span>
                                                </div>
                                                <input class="form-control form-control-lg form-control-solid" type="text" readonly value="<?=$user->username?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Group-->
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left"><?=Yii::t('app', 'Phone');?></label>
                                        <div class="col-9">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-phone"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control form-control-lg form-control-solid" readonly value="<?=$user->employee->phone?>" placeholder="Phone" />
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Group-->
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left"><?=Yii::t('app', 'Email');?></label>
                                        <div class="col-9">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-at"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control form-control-lg form-control-solid" readonly value="<?=$user->email?>" placeholder="Email" />
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Group-->
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left"><?=Yii::t('app', 'Status');?></label>
                                        <div class="col-9">
                                            <div class="input-group input-group-lg input-group-solid bg-white">
                                                <div class="btn btn-<?=($user->status == 1) ? 'success' : 'danger' ?>">
                                                    <?=Contragent::getStatusList($user->status);?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Group-->
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
                                            <label class="col-form-label col-2 text-lg-right text-left"><?=Yii::t('app', 'Employee');?>:</label>
                                            <div class="col-9">
                                                <div class="checkbox-single">
                                                    <label class="pt-1">
                                                        <span><i class="la la-file-text"></i></span>
                                                        <?=Yii::t('app', 'General information about the employee');?>.
                                                    </label>
                                                </div>
                                                <div class="form-text text-muted"><?=Yii::t('app', 'Personal data, tax information and passport data of the employee');?>.</div>
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                        <div class="my-2 mx-0 col-md-6">
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-2 text-lg-right text-left"><?=Yii::t('app', 'Full Name');?></label>
                                                <div class="col-10">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$user->employee->fullName?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-2 py-1 text-lg-right text-left"><?=Yii::t('app', 'Birth Date');?></label>
                                                <div class="col-10">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <input type="text" readonly class="form-control form-control-lg form-control-solid" value="<?=$user->employee->birthDate?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-2 py-1 text-lg-right text-left"><?=Yii::t('app', 'Region ID');?></label>
                                                <div class="col-10">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$user->employee->ns10Name?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-2 text-lg-right text-left"><?=Yii::t('app', 'District ID');?></label>
                                                <div class="col-10">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$user->employee->ns11Name?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-2 text-lg-right text-left"><?=Yii::t('app', 'Inn');?></label>
                                                <div class="col-10">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$user->employee->tin?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                        </div>
                                        <div class="my-2 mx-0 col-md-6">
                                            <!--begin::Group-->
                                            <div class="form-group row align-items-center">
                                                <label class="col-form-label col-7 my-0 py-0 text-lg-right text-left"><?=Yii::t('app', 'Sex Name');?></label>
                                                <div class="col-5">
                                                    <div class="checkbox-inline">
                                                        <label class="checkbox">
                                                        <input type="checkbox" disabled="disabled" <?=($user->employee->sex == 1) ? 'checked' : '' ?> /><i class="text-<?=($user->employee->sex == 1) ? 'dark' : '' ?>"><?=Yii::t('app', 'Man');?></i>
                                                        <span></span></label>
                                                        <label class="checkbox">
                                                        <input type="checkbox" disabled="disabled" <?=($user->employee->sex == 2) ? 'checked' : '' ?> /><i class="text-<?=($user->employee->sex == 2) ? 'dark' : '' ?>"><?=Yii::t('app', 'Woman');?></i>
                                                        <span></span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <div class="form-text text-muted my-2 text-center"><?=Yii::t('app', 'Employee\'s passport data');?>.</div>
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-2 text-lg-right text-left"><?=Yii::t('app', 'Pass Series');?></label>
                                                <div class="col-3 col-xl-2">
                                                    <div class="form-control form-control-lg text-center px-0 form-control-solid">
                                                        <?=$user->employee->passSeries?>
                                                    </div>
                                                </div>
                                                <label class="col-form-label col-3 text-lg-right text-left"><?=Yii::t('app', 'Pass Number');?></label>
                                                <div class="col-4 col-xl-5">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$user->employee->passNumber?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-2 text-lg-right text-left"><?=Yii::t('app', 'Doc Name');?></label>
                                                <div class="col-10">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$user->employee->docName?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-2 py-1 text-lg-right text-left"><?=Yii::t('app', 'Pass Date');?></label>
                                                <div class="col-10">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$user->employee->passDate?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-2 py-1 text-lg-right text-left"><?=Yii::t('app', 'Pass Org');?></label>
                                                <div class="col-10">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$user->employee->passOrg?>" />
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
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$user->employee->address?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                        </div>
                                        <div class="my-2 mx-0 col-md-12">
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-xl-1 col-2 text-lg-right text-left"><?=Yii::t('app', 'Tin Date');?></label>
                                                <div class="col-xl-2 col-3">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$user->employee->tinDate?>" />
                                                    </div>
                                                </div>
                                                <label class="col-form-label col-2 text-lg-right text-left"><?=Yii::t('app', 'Personal Num');?></label>
                                                <div class="col-3">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <input type="text" readonly class="form-control form-control-lg form-control-solid" value="<?=$user->employee->personalNum?>" />
                                                    </div>
                                                </div>
                                                <label class="col-form-label col-2 text-lg-right text-left"><?=Yii::t('app', 'Zip Code');?></label>
                                                <div class="col-2">
                                                    <div class="">
                                                        <input readonly class="form-control form-control-lg form-control-solid" type="text" value="<?=$user->employee->zipCode?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-form-label col-4 text-lg-right text-left"><?=Yii::t('app', 'Ns13 Name');?></label>
                                                <div class="col-5">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <input type="text" readonly class="form-control form-control-lg form-control-solid" value="<?=$user->employee->ns13Name?>" />
                                                    </div>
                                                </div>
                                                <label class="col-form-label col-1 text-lg-right text-left"><?=Yii::t('app', 'Duty');?></label>
                                                <div class="col-2">
                                                    <span class="btn btn-<?php echo ($user->employee->duty == 'false') ? 'success' : 'danger';?>">
                                                        <?php echo ($user->employee->duty == 'false') ? Yii::t('app', 'Not In Debt') : Yii::t('app', 'Debtor');?>        
                                                    </span>
                                                </div>
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
