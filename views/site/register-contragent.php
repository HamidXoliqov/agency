<?php
/**
 * @var $info
 * @var $errorMsg
 * @var $userData
 * @var $userTaxData
 */

?>
<div class="d-flex flex-column flex-root">
<!--begin::Page-->
<div class="d-flex flex-row flex-column-fluid page">

    <!--begin::Wrapper-->
    <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

        <!--end::Header-->
        <!--begin::Content-->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">
                <!--begin::Container-->
                <div class="container">
                    <div class="card card-custom">
                        <div class="card-body p-0">
                            <?php if ($errorMsg) : ?>
                                <div class="alert">
                                    <div class="alert  alert-custom alert-danger" role="alert">
                                        <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
                                        <div class="alert-text"><?php echo $errorMsg; ?></div>
                                    </div>
                                </div>
                            <?php endif ?>
                            <!--begin: Wizard-->
                            <div class="wizard wizard-2" id="kt_wizard_v2" data-wizard-state="step-first" data-wizard-clickable="false">
                                <!--begin: Wizard Nav-->
                                <div class="wizard-nav border-right py-8 px-8">
                                    <!--begin::Wizard Step 1 Nav-->
                                    <div class="wizard-steps">
                                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                            <div class="wizard-wrapper">
                                                <div class="wizard-icon">
                                                    <span class="svg-icon svg-icon-2x">
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
                                                </div>
                                                <div class="wizard-label">
                                                    <h3 class="wizard-title"><?php echo Yii::t('app', 'Account Settings')?></h3>
                                                    <div class="wizard-desc"><?php echo Yii::t('app', 'Setup Your Account Details')?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Wizard Step 1 Nav-->
                                        <!--begin::Wizard Step 2 Nav-->
                                        <div class="wizard-step" data-wizard-type="step">
                                            <div class="wizard-wrapper">
                                                <div class="wizard-icon">
                                                    <span class="svg-icon svg-icon-2x">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Credit-card.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2" />
                                                                <rect fill="#000000" x="2" y="8" width="20" height="3" />
                                                                <rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </div>
                                                <div class="wizard-label">
                                                    <h3 class="wizard-title"><?php echo Yii::t('app', 'Organization Info')?></h3>
                                                    <div class="wizard-desc"><?php echo Yii::t('app', 'Fill Organization Info')?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Wizard Step 2 Nav-->
                                        <!--begin::Wizard Step 3 Nav-->
                                        <div class="wizard-step" data-wizard-type="step">
                                            <div class="wizard-wrapper">
                                                <div class="wizard-icon">
                                                    <span class="svg-icon svg-icon-2x">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path d="M16.3740377,19.9389434 L22.2226499,11.1660251 C22.4524142,10.8213786 22.3592838,10.3557266 22.0146373,10.1259623 C21.8914367,10.0438285 21.7466809,10 21.5986122,10 L17,10 L17,4.47708173 C17,4.06286817 16.6642136,3.72708173 16.25,3.72708173 C15.9992351,3.72708173 15.7650616,3.85240758 15.6259623,4.06105658 L9.7773501,12.8339749 C9.54758575,13.1786214 9.64071616,13.6442734 9.98536267,13.8740377 C10.1085633,13.9561715 10.2533191,14 10.4013878,14 L15,14 L15,19.5229183 C15,19.9371318 15.3357864,20.2729183 15.75,20.2729183 C16.0007649,20.2729183 16.2349384,20.1475924 16.3740377,19.9389434 Z" fill="#000000" />
                                                                <path d="M4.5,5 L9.5,5 C10.3284271,5 11,5.67157288 11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L4.5,8 C3.67157288,8 3,7.32842712 3,6.5 C3,5.67157288 3.67157288,5 4.5,5 Z M4.5,17 L9.5,17 C10.3284271,17 11,17.6715729 11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L4.5,20 C3.67157288,20 3,19.3284271 3,18.5 C3,17.6715729 3.67157288,17 4.5,17 Z M2.5,11 L6.5,11 C7.32842712,11 8,11.6715729 8,12.5 C8,13.3284271 7.32842712,14 6.5,14 L2.5,14 C1.67157288,14 1,13.3284271 1,12.5 C1,11.6715729 1.67157288,11 2.5,11 Z" fill="#000000" opacity="0.3" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </div>
                                                <div class="wizard-label">
                                                    <h3 class="wizard-title"><?php echo Yii::t('app', 'Organization Add Info')?></h3>
                                                    <div class="wizard-desc"><?php echo Yii::t('app', 'Fill Organization Add Info')?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Wizard Step 3 Nav-->
                                        <div class="wizard-step" data-wizard-type="step">
                                            <div class="wizard-wrapper">
                                                <div class="wizard-icon">
                                                    <span class="svg-icon svg-icon-2x">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Like.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path d="M9,10 L9,19 L10.1525987,19.3841996 C11.3761964,19.7920655 12.6575468,20 13.9473319,20 L17.5405883,20 C18.9706314,20 20.2018758,18.990621 20.4823303,17.5883484 L21.231529,13.8423552 C21.5564648,12.217676 20.5028146,10.6372006 18.8781353,10.3122648 C18.6189212,10.260422 18.353992,10.2430672 18.0902299,10.2606513 L14.5,10.5 L14.8641964,6.49383981 C14.9326895,5.74041495 14.3774427,5.07411874 13.6240179,5.00562558 C13.5827848,5.00187712 13.5414031,5 13.5,5 L13.5,5 C12.5694044,5 11.7070439,5.48826024 11.2282564,6.28623939 L9,10 Z" fill="#000000" />
                                                                <rect fill="#000000" opacity="0.3" x="2" y="9" width="5" height="11" rx="1" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </div>
                                                <div class="wizard-label">
                                                    <h3 class="wizard-title"><?php echo Yii::t('app', 'Completed!')?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end: Wizard Nav-->
                                <!--begin: Wizard Body-->
                                <div class="wizard-body py-8 px-8">
                                    <!--begin: Wizard Form-->
                                    <div class="row">
                                        <div class="offset-xxl-2 col-xxl-8">
                                            <form class="form" name="register_contragent" method="post" action="/site/register-user" id="kt_form">
                                                <!--begin: Wizard Step 1-->
                                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                                    <h4 class="mb-10 font-weight-bold text-dark"><?php echo Yii::t('app', 'Enter your Account Details')?></h4>
                                                    <!--begin::Input-->
                                                    <input type="hidden" id="csrf" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                                                    <input type="hidden" name="serial" id="uid" value="<?php echo $userData['serial'] ?>">
                                                    <input type="hidden" name="tin" id="tin" value="<?php echo $userData['tin'] ?>">
                                                    <input type="hidden" id="keyId" name="keyId" value="<?php echo $userData['keyId'] ?>">
                                                    <input type="hidden" id="key" name="key" value="<?php echo $userData['key'] ?>">
                                                    <textarea name="pkcs7" id="pkcs7" class="hidden"><?php echo $userData['pkcs7'] ?></textarea>
                                                    <div class="form-group">
                                                        <label><?php echo Yii::t('app', 'Fullname')?></label>
                                                        <input type="text"
                                                               class="form-control form-control-solid form-control-sm"
                                                               name="fullname"
                                                               placeholder="<?php echo Yii::t('app', 'Fullname')?>"
                                                               value="<?php echo $userData['fio'] ?>" readonly="readonly" />
                                                    </div>
                                                    <!--end::Input-->
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label><?php echo Yii::t('app', 'Username')?></label>
                                                        <input type="text"
                                                               class="form-control form-control-solid form-control-sm"
                                                               name="username"
                                                               id="username"
                                                               placeholder="<?php echo Yii::t('app', 'Username')?>" />
                                                    </div>
                                                    <!--end::Input-->
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <!--begin::Input-->
                                                            <div class="form-group">
                                                                <label><?php echo Yii::t('app', 'Password')?></label>
                                                                <input type="password"
                                                                       class="form-control form-control-solid form-control-sm"
                                                                       name="password"
                                                                       id="password"
                                                                       placeholder="<?php echo Yii::t('app', 'Password')?>" />
                                                            </div>
                                                            <!--<div class="progress">
                                                                <div id="passwordMeter" class="progress-bar" style="width:0"></div>
                                                            </div>-->
                                                            <!--end::Input-->
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <!--begin::Input-->
                                                            <div class="form-group">
                                                                <label><?php echo Yii::t('app', 'Confirm Password')?></label>
                                                                <input type="password"
                                                                       class="form-control form-control-solid form-control-sm"
                                                                       name="confirm_password"
                                                                       id="confirm_password"
                                                                       placeholder="<?php echo Yii::t('app', 'Confirm Password')?>" />
                                                            </div>
                                                            <!--end::Input-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end: Wizard Step 1-->
                                                <!--begin: Wizard Step 2-->
                                                <div class="pb-5" data-wizard-type="step-content">
                                                    <h4 class="mb-10 font-weight-bold text-dark"><?php echo Yii::t('app', 'Organization Info') ?></h4>
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <!--begin::Input-->
                                                            <div class="form-group">
                                                                <label><?php echo Yii::t('app', 'Organization Fullname') ?></label>
                                                                <input type="text"
                                                                       class="form-control form-control-solid form-control-sm"
                                                                       name="org_name"
                                                                       placeholder="<?php echo Yii::t('app', 'Organization Fullname') ?>"
                                                                       value="<?php echo htmlspecialchars($userTaxData['nameFull']) ?>" readonly="readonly" />
                                                            </div>
                                                            <!--end::Input-->
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <!--begin::Input-->
                                                            <div class="form-group">
                                                                <label><?php echo Yii::t('app', 'Organization Short Name') ?></label>
                                                                <input type="text"
                                                                       class="form-control form-control-solid form-control-sm"
                                                                       name="org_short_name"
                                                                       placeholder="<?php echo Yii::t('app', 'Organization Short Name') ?>"
                                                                       value="<?php echo htmlspecialchars($userTaxData['name']) ?>" />
                                                            </div>
                                                            <!--end::Input-->
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <!--begin::Input-->
                                                            <div class="form-group">
                                                                <label><?php echo Yii::t('app', 'Inn') ?></label>
                                                                <input type="text"
                                                                       class="form-control form-control-solid form-control-sm"
                                                                       name="org_tin"
                                                                       placeholder="<?php echo Yii::t('app', 'Inn') ?>"
                                                                       value="<?php echo $userTaxData['tin'] ?>" readonly="readonly" />
                                                            </div>
                                                            <!--end::Input-->
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <!--begin::Input-->
                                                            <div class="form-group">
                                                                <label><?php echo Yii::t('app', 'Address') ?></label>
                                                                <input type="text"
                                                                       class="form-control form-control-solid form-control-sm"
                                                                       name="org_address"
                                                                       placeholder="<?php echo Yii::t('app', 'Address') ?>"
                                                                       value="<?php echo $userTaxData['ns10Name']. ", " .$userTaxData['ns11Name']. ", " .$userTaxData['address'] ?>" />
                                                            </div>
                                                            <!--end::Input-->
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <!--begin::Select-->
                                                            <div class="form-group">
                                                                <label><?php echo Yii::t('app', 'Okonx') ?></label>
                                                                <input type="text"
                                                                       class="form-control form-control-solid form-control-sm"
                                                                       name="org_oked"
                                                                       placeholder="<?php echo Yii::t('app', 'Okonx') ?>"
                                                                       value="<?php echo $userTaxData['okpo'] ?>" readonly="readonly" />
                                                            </div>
                                                            <!--end::Input-->
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <!--begin::Input-->
                                                            <div class="form-group">
                                                                <label><?php echo Yii::t('app', 'Director') ?></label>
                                                                <input type="text"
                                                                       class="form-control form-control-solid form-control-sm"
                                                                       name="org_director"
                                                                       placeholder="<?php echo Yii::t('app', 'Director') ?>"
                                                                       value="<?php echo $userTaxData['gdFullName'] ?>" readonly="readonly" />
                                                            </div>
                                                            <!--end::Input-->
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <!--begin::Select-->
                                                            <div class="form-group">
                                                                <label><?php echo Yii::t('app', 'Accounter') ?></label>
                                                                <input type="text"
                                                                       class="form-control form-control-solid form-control-sm"
                                                                       name="org_accounter"
                                                                       placeholder="<?php echo Yii::t('app', 'Accounter') ?>"
                                                                       value="<?php echo $userTaxData['gbFullName'] ?>" readonly="readonly" />

<!--
                                                                <input type="hidden" name="org_region" value="<?php echo $userTaxData['ns10Code'] ?>">
                                                                <input type="hidden" name="org_district" value="<?php echo $userTaxData['ns11Code'] ?>">
                                                                <input type="hidden" name="org_bank_account_number" value="<?php echo $userTaxData['account'] ?>">
                                                                <input type="hidden" name="org_fund" value="<?php echo $userTaxData['fund'] ?>">
                                                                <input type="hidden" name="org_director_inn" value="<?php echo $userTaxData['gdTin'] ?>">
                                                                <input type="hidden" name="org_tel" value="<?php echo $userTaxData['gdTelWork'] ?>">
                                                                <input type="hidden" name="org_accounter_inn" value="<?php echo $userTaxData['gbTin'] ?>">
                                                                <input type="hidden" name="org_accounter_tel" value="<?php echo $userTaxData['gbTelWork'] ?>">
                                                                <input type="hidden" name="org_reg_date" value="<?php echo $userTaxData['regDate'] ?>">
                                                                <input type="hidden" name="org_reg_num" value="<?php echo $userTaxData['regNum'] ?>">
                                                                <input type="hidden" name="org_bank" value="<?php echo $userTaxData['ns2Code'] ? $userTaxData['ns2Code'] : '' ?>">
                                                                <input type="hidden" name="org_bank_code" value="<?php echo $userTaxData['ns2Name'] ? htmlspecialchars($userTaxData['ns2Name']) : '' ?>">
-->
                                                            </div>
                                                            <!--end::Input-->
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <div class="form-group">
                                                                <label><?php echo Yii::t('app-msg','Organization region') ?></label>
                                                                <input type="text" class="form-control form-control-solid form-control-sm" readonly="readonly"
                                                                       name="org_region" placeholder="<?php echo Yii::t('app-msg','Organization region') ?>"
                                                                       value="<?php echo $userTaxData['ns10Code'] ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="form-group">
                                                                <label><?php echo Yii::t('app-msg','Organization district') ?></label>
                                                                <input type="text" class="form-control form-control-solid form-control-sm" readonly="readonly"
                                                                       name="org_district"
                                                                       placeholder="<?php echo Yii::t('app-msg','Organization district') ?>"
                                                                       value="<?php echo $userTaxData['ns11Code'] ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <div class="form-group">
                                                                <label><?php echo Yii::t('app-msg','Organization bank account number') ?></label>
                                                                <input type="text" class="form-control form-control-solid form-control-sm" readonly="readonly"
                                                                       name="org_bank_account_number" placeholder="<?php echo Yii::t('app-msg','Organization bank account number') ?>"
                                                                       value="<?php echo $userTaxData['account'] ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="form-group">
                                                                <label><?php echo Yii::t('app-msg','Organization fund') ?></label>
                                                                <input type="text" class="form-control form-control-solid form-control-sm" readonly="readonly"
                                                                       name="org_fund"
                                                                       placeholder="<?php echo Yii::t('app-msg','Organization fund') ?>"
                                                                       value="<?php echo $userTaxData['fund'] ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <div class="form-group">
                                                                <label><?php echo Yii::t('app-msg','Organization director inn') ?></label>
                                                                <input type="text" class="form-control form-control-solid form-control-sm" readonly="readonly"
                                                                       name="org_director_inn" placeholder="<?php echo Yii::t('app-msg','Organization director inn') ?>"
                                                                       value="<?php echo $userTaxData['gdTin'] ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="form-group">
                                                                <label><?php echo Yii::t('app-msg','Organization phone') ?></label>
                                                                <input type="text" class="form-control form-control-solid form-control-sm" readonly="readonly"
                                                                       name="org_tel"  placeholder="<?php echo Yii::t('app-msg','Organization phone') ?>"
                                                                       value="<?php echo $userTaxData['gdTelWork'] ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <div class="form-group">
                                                                <label><?php echo Yii::t('app-msg','Organization accounter inn') ?></label>
                                                                <input type="text" class="form-control form-control-solid form-control-sm" readonly="readonly"
                                                                       name="org_accounter_inn" placeholder="<?php echo Yii::t('app-msg','Organization accounter inn') ?>"
                                                                       value="<?php echo $userTaxData['gbTin'] ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="form-group">
                                                                <label><?php echo Yii::t('app-msg','Organization accounter phone') ?></label>
                                                                <input type="text" class="form-control form-control-solid form-control-sm" readonly="readonly"
                                                                       name="org_accounter_tel"  placeholder="<?php echo Yii::t('app-msg','Organization accounter phone') ?>"
                                                                       value="<?php echo $userTaxData['gbTelWork'] ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <div class="form-group">
                                                                <label><?php echo Yii::t('app-msg','Organization registration date') ?></label>
                                                                <input type="text" class="form-control form-control-solid form-control-sm" readonly="readonly"
                                                                       name="org_reg_date" placeholder="<?php echo Yii::t('app-msg','Organization registration date') ?>"
                                                                       value="<?php echo $userTaxData['regDate'] ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="form-group">
                                                                <label><?php echo Yii::t('app-msg','Organization registration number') ?></label>
                                                                <input type="text" class="form-control form-control-solid form-control-sm" readonly="readonly"
                                                                       name="org_reg_num"  placeholder="<?php echo Yii::t('app-msg','Organization registration number') ?>"
                                                                       value="<?php echo $userTaxData['regNum'] ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <div class="form-group">
                                                                <label><?php echo Yii::t('app-msg','Organization bank code') ?></label>
                                                                <input type="text" class="form-control form-control-solid form-control-sm" readonly="readonly"
                                                                       name="org_bank_code" placeholder="<?php echo Yii::t('app-msg','Organization bank code') ?>"
                                                                       value="<?php echo $userTaxData['ns2Code'] ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="form-group">
                                                                <label><?php echo Yii::t('app-msg','Organization bank') ?></label>
                                                                <input type="text" class="form-control form-control-solid form-control-sm" readonly="readonly"
                                                                       name="org_bank"  placeholder="<?php echo Yii::t('app-msg','Organization bank') ?>"
                                                                       value="<?php echo $userTaxData['ns2Name'] ? htmlspecialchars($userTaxData['ns2Name']) : '' ?>" />
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>
                                                <!--end: Wizard Step 2-->
                                                <!--begin: Wizard Step 3-->
                                                <div class="pb-5" data-wizard-type="step-content">
                                                    <h4 class="mb-10 font-weight-bold text-dark"><?php echo Yii::t('app', 'Organization Add Info')?></h4>

                                                    <div class="form-group">
                                                        <label><?php echo Yii::t('app', 'Organization add field')?></label>
                                                        <input type="text"
                                                               class="form-control form-control-solid form-control-sm"
                                                               name="org_add_field"
                                                               id="org_add_field"
                                                               placeholder="<?php echo Yii::t('app', 'Organization add field')?>" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label><?php echo Yii::t('app', 'Organization add file')?></label>
                                                        <input type="file"
                                                               class="form-control form-control-solid form-control-sm"
                                                               name="org_add_file[]"
                                                               id="org_add_file"
                                                               placeholder="<?php echo Yii::t('app', 'Organization add file')?>" multiple/>
                                                    </div>
                                                </div>
                                                <!--end: Wizard Step 3-->
                                                <div class="pb-5" data-wizard-type="step-content">
                                                    <div class="alert">
                                                        <div class="alert  alert-custom alert-success" role="alert">
                                                            <div class="alert-icon"><i class="flaticon-user-ok"></i></div>
                                                            <div class="alert-text"><?php echo Yii::t('app', 'You will be informed')?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--begin: Wizard Actions-->
                                                <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                                    <div class="mr-2">
                                                        <button class="btn btn-light-primary font-weight-bold text-uppercase"
                                                                data-wizard-type="action-prev">
                                                            <?php echo Yii::t('app', 'Previous')?>
                                                        </button>
                                                    </div>
                                                    <div>
                                                        <button class="btn btn-success font-weight-bold text-uppercase"
                                                                data-wizard-type="action-submit">
                                                            <?php echo Yii::t('app', 'Submit')?>
                                                        </button>
                                                        <button class="btn btn-primary font-weight-bold text-uppercase"
                                                                data-wizard-type="action-next">
                                                            <?php echo Yii::t('app', 'Next Step')?>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!--end: Wizard Actions-->
                                            </form>
                                        </div>
                                        <!--end: Wizard-->
                                    </div>
                                    <!--end: Wizard Form-->
                                </div>
                                <!--end: Wizard Body-->
                            </div>
                            <!--end: Wizard-->
                        </div>
                    </div>
                </div>
                <!--end::Container-->
            </div>
            <!--end::Entry-->
        </div>
        <!--end::Content-->
        <!--begin::Footer-->

    </div>
    <!--end::Wrapper-->
</div>
<!--end::Page-->
</div>


<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
    <span class="svg-icon">
        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24" />
                <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
                <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
            </g>
        </svg>
        <!--end::Svg Icon-->
    </span>
</div>

<?php
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
                    fullname: {
                        validators: {
                            notEmpty: {
                                message: requiredField
                            }
                        }
                    },
                    username: {
                        validators: {
                            notEmpty: {
                                message: requiredField
                            }
                        }
                    },
                    password: {
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
                            /*different: {
                                compare: function() {
                                    return form.querySelector('[name="username"]').value;
                                },
                                message: 'The username and password cannot be the same as each other'
                            }*/
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
                    /*passwordStrength: new FormValidation.plugins.PasswordStrength({
                        field: 'password',
                        message: 'The password is weak',
                        minimalScore: 3,
                        onValidated: function(valid, message, score) {
                            switch (score) {
                                case 0:
                                    passwordMeter.style.width = randomNumber(1, 20) + '%';
                                    passwordMeter.style.backgroundColor = '#ff4136';
                                case 1:
                                    passwordMeter.style.width = randomNumber(20, 40) + '%';
                                    passwordMeter.style.backgroundColor = '#ff4136';
                                    break;
                                case 2:
                                    passwordMeter.style.width = randomNumber(40, 60) + '%';
                                    passwordMeter.style.backgroundColor = '#ff4136';
                                    break;
                                case 3:
                                    passwordMeter.style.width = randomNumber(60, 80) + '%';
                                    passwordMeter.style.backgroundColor = '#ffb700';
                                    break;
                                case 4:
                                    passwordMeter.style.width = '100%';
                                    passwordMeter.style.backgroundColor = '#19a974';
                                    break;
                                default:
                                    break;
                            }
                        },
                    })*/
                }
            }
        ));
    
        // Step 2
        _validations.push(FormValidation.formValidation(
            _formEl,
            {
                fields: {
                    org_name: {
                        validators: {
                            notEmpty: {
                                message: requiredField
                            }
                        }
                    },
                    org_short_name: {
                        validators: {
                            notEmpty: {
                                message: requiredField
                            }
                        }
                    },
                    org_tin: {
                        validators: {
                            notEmpty: {
                                message: requiredField
                            }
                        }
                    },
                    org_address: {
                        validators: {
                            notEmpty: {
                                message: requiredField
                            }
                        }
                    },
                    org_oked: {
                        validators: {
                            notEmpty: {
                                message: requiredField
                            }
                        }
                    },
                    org_director: {
                        validators: {
                            notEmpty: {
                                message: requiredField
                            }
                        }
                    },
                    org_accounter: {
                        validators: {
                            notEmpty: {
                                message: requiredField
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            }
        ));
    
        // Step 3
        _validations.push(FormValidation.formValidation(
            _formEl,
            {
                fields: {
                    org_add_field: {
                        validators: {
                            notEmpty: {
                                message: requiredField
                            }
                        }
                    },
                    'org_add_file[]': {
                        validators: {
                            notEmpty: {
                                message: requiredField
                            },
                            file: {
                                extension: 'xls',
                                type: 'application/vnd.ms-excel',
                                maxSize: 2097152,   // 2048 * 1024
                                message: xlsField
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            }
        ));
        
        // Enable the password/confirm password validators if the password is not empty
        var enabled = false;
        document.getElementById('kt_form').querySelector('[name="password"]').addEventListener('input', function(e) {
            const password = e.target.value;
            if (password === '' && enabled) {
                enabled = false;
                _validations[0].disableValidator('confirm_password');
            } else if (password != '' && !enabled) {
                enabled = true;
                _validations[0].enableValidator('password').enableValidator('confirm_password');
            }
            
            // Revalidate the confirmation password when the new password is changed
            if (password != '' && enabled) {
                _validations[0].revalidateField('confirm_password');
            }
        });
        
        $('#username').on('focusout', function(e) {
            if ($(this).val() == '') {
                return false;
            }
            $.ajax({
                url:urlCheck,
                data:{
                    _csrf: $('#csrf').val(),
                    username:$(this).val(),
                    inn: $('#tin').val()
                },
                type:'POST',
                success: function(response){
                    if(response.status == 'success'){
                        console.log(response);
                    }
                }
            });
        });
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

JS;

$css = <<<CSS
    .hidden {
     display: none;
    }
CSS;

$this->registerJs($js, \yii\web\View::POS_END);
$this->registerCss($css);
?>