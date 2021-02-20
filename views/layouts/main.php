<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
use yii\web\View;
use yii\widgets\Breadcrumbs;
/** @var  $content */
/** @var  $response */
    AppAsset::register($this);
    $response = message();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Page with empty content"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href="<?= Url::base() ?>/asset/media/logos/favicon.ico"/>
</head>
<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<?php $this->beginBody() ?>
<script>
window.YiiPosLoadJsScripts = [];
function loadYiiPosLoadJsScripts() {
    for(var i in YiiPosLoadJsScripts) {
        try {
            let func = YiiPosLoadJsScripts[i];
            func();
        } catch (e) {
            console.log(e);
        }
    }
}
function addYiiPosLoadJs(func) {
    YiiPosLoadJsScripts.push(func);
}
</script>
<?php
$this->registerJs("loadYiiPosLoadJsScripts()", \yii\web\View::POS_LOAD);
?>
<div id="kt_header_mobile" class="no-print-flex header-mobile align-items-center header-mobile-fixed">
    <!--begin::Logo-->
    <a href="<?= Url::home() ?>" class="text-white">
        <b><?= strtoupper(Yii::$app->name); ?></b>
    </a>
    <!--end::Logo-->
    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
        <!--begin::Aside Mobile Toggle-->
        <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
            <span></span>
        </button>
        <!--end::Aside Mobile Toggle-->

        <!--begin::Topbar Mobile Toggle-->
        <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24"/>
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                      fill="#000000" fill-rule="nonzero" opacity="0.3"/>
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                      fill="#000000" fill-rule="nonzero"/>
							</g>
						</svg>
                        <!--end::Svg Icon-->
					</span>
        </button>
        <!--end::Topbar Mobile Toggle-->
    </div>
    <!--end::Toolbar-->
</div>
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
        <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
            <!--begin::Brand-->
            <div class="brand flex-column-auto text-sm-center" id="kt_brand" >
                <!--begin::Logo-->
                <a href="<?= Url::home() ?>" class="brand-logo">
                    <img src="<?= Url::base() ?>/asset/media/logos/logo-default.png"
                         alt="<?//= Yii::$app->controller->info['img_header']; ?>" style="width: 120px">
                </a>
                <!--end::Logo-->
                <!--begin::Toggle-->
                <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
							<span class="svg-icon svg-icon svg-icon-xl">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24"/>
										<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                              fill="#000000" fill-rule="nonzero"
                                              transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)"/>
										<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                              fill="#000000" fill-rule="nonzero" opacity="0.3"
                                              transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)"/>
									</g>
								</svg>
                                <!--end::Svg Icon-->
							</span>
                    
                </button>
                <!--end::Toolbar-->
            </div>
            <!--end::Brand-->


            <!--begin::Aside Menu-->
            <?= $this->render( 'left.php' ); ?>
            <!--end::Aside Menu-->
        </div>
        <!--end::Aside-->


        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header header-fixed">
                <!--begin::Container-->
                <div class="container-fluid d-flex align-items-stretch justify-content-between" style="background-color:#1a1a27">
                    <!--begin::Header Menu Wrapper-->
                    <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                    </div>
                    <!--end::Header Menu Wrapper-->
                    <!--begin::Topbar-->
                    <div class="topbar no-print-flex">
                        <!--begin::Languages-->
                        <div class="dropdown">
                            <!--begin::Toggle-->
                            <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">

                                    <?php if (Yii::$app->language == 'uz'): ?>
                                        <img class="h-20px w-20px rounded-sm"
                                             src="<?= Url::base(); ?>/asset/media/svg/flags/190-uzbekistn.svg"
                                             alt="UZB"/>
                                    <?php elseif (Yii::$app->language == 'ru'): ?>
                                        <img class="h-20px w-20px rounded-sm"
                                             src="<?= Url::base(); ?>/asset/media/svg/flags/248-russia.svg"
                                             alt="RUS"/>
                                    <?php elseif (Yii::$app->language == 'en'): ?>
                                        <img class="h-20px w-20px rounded-sm"
                                             src="<?= Url::base(); ?>/asset/media/svg/flags/260-united-kingdom.svg"
                                             alt="ENG"/>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!--end::Toggle-->
                            <!--begin::Dropdown-->
                            <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                                <!--begin::Nav-->
                                <ul class="navi navi-hover py-4">
                                    <!--begin::Item-->
                                    <li class="navi-item">
                                        <?php foreach (Yii::$app->params['language'] as $key => $value): ?>
                                            <a href="<?= Url::to(['/base/select-lang', 'lang' => $key]) ?>"
                                               class="navi-link"><span class="symbol symbol-20 mr-3">
                                                       <?php if ($key == 'en'): ?>
                                                           <img src="<?= Url::base(); ?>/asset/media/svg/flags/260-united-kingdom.svg"
                                                                alt="ENG"/>
                                                       <?php elseif ($key == 'uz'): ?>
                                                           <img src="<?= Url::base(); ?>/asset/media/svg/flags/190-uzbekistn.svg"
                                                                alt="UZB"/>
                                                       <?php elseif ($key == 'ru'): ?>
                                                           <img src="<?= Url::base(); ?>/asset/media/svg/flags/248-russia.svg"
                                                                alt="RUS"/>
                                                       <?php endif; ?>
											</span>
                                                <span class="navi-text"><?= $value ?></span>
                                            </a>
                                        <?php endforeach; ?>
                                    </li>
                                </ul>
                                <!--end::Nav-->
                            </div>
                            <!--end::Dropdown-->
                        </div>
                        <!--end::Languages-->
                        <!--begin::User-->
                        <div class="topbar-item">
                            <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2"
                                 id="kt_quick_user_toggle">
                                <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1"></span>
                                <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3"><?= Yii::$app->user->identity->username; ?></span>
                                <span class="symbol symbol-35 symbol-light-success">
											<span class="symbol-label font-size-h5 font-weight-bold"><?= strtoupper(substr(Yii::$app->user->identity->username, 0, 1)); ?></span>
										</span>
                            </div>
                        </div>
                        <!--end::User-->
                    </div>
                    <!--end::Topbar-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Subheader-->
                <div class="no-print-flex subheader py-4 subheader-solid">
                    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center flex-wrap alert-light-info">
                            <!--begin::Page Heading-->
                            <div class="d-flex align-items-baseline mt-1">
                                <?= Breadcrumbs::widget([
                                    'options' => [
                                        'class' => "breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold",
                                    ],
                                    'itemTemplate' => "<li class='breadcrumb-item'>{link}</li>",
                                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//                                    'format' => 'raw'
                                ]); ?>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page Heading-->
                        </div>
                        <!--end::Info-->
                        <!--begin::Toolbar-->
                    </div>
                </div>
                <!--end::Subheader-->
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class="container-fluid">


                       <?= $content; ?>


                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                <!--begin::Container-->
                <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <!--begin::Copyright-->
                    <div class="no-print text-dark order-2 order-md-1">
                        <span class="text-muted font-weight-bold mr-2">2020©</span>
                        <a href="#" target="_blank"
                           class="text-dark-75 text-hover-primary">Dataprizma LLC</a>
                    </div>
                    <!--end::Copyright-->
                    <!--begin::Nav-->
                    <div class="no-print nav nav-dark">
                        <a href="#" target="_blank"
                           class="text-dark-75 text-hover-primary">Dataprizma LLC</a>
                    </div>
                    <!--end::Nav-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->
<!-- begin::User Panel-->
<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <h3 class="font-weight-bold m-0"><?=Yii::t('app', 'User Profile')?>
            <small class="text-muted font-size-sm ml-2"></small></h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content " >
        <!--begin::Header-->
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                <div class="symbol-label"
                     style="background-image:url('<?=Url::base().'/img/users/default.jpg';?>')">
                </div>
                <i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column w-75" >
                <a href="#"
                   class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary"><?= Yii::$app->user->identity->fullname; ?></a>
                <div class="text-muted mt-1"><?= Yii::$app->user->identity->username; ?></div>
                <div class="navi mt-2" >
                    <a href="#" class="navi-item">
								<span class="navi-link p-0 pb-2">
									<span class="navi-icon mr-1">
										<span class="svg-icon svg-icon-lg svg-icon-primary">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
											<svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                          fill="#000000"/>
													<circle fill="#000000" opacity="1" cx="19.5" cy="17.5" r="2.5"/>
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
									</span>
									<span class="navi-text text-muted text-hover-primary"><?= Yii::$app->user->identity->email; ?></span>
								</span>
                    </a>
                    <div class="row">
                        <?php if (!Yii::$app->user->isGuest): ?>
                        <div class="col-sm-12">
                                <?php ActiveForm::begin([
                                    'method' => 'POST',
                                    'action' => '/site/logout',
                                ]); ?>
                                <button class="btn btn-xs btn-light-primary font-weight-bolder py-2 px-3">
                                    <?= Yii::t('app', 'Sign Out') ?></button>
                                <?php ActiveForm::end(); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Separator-->
        <div class="separator separator-dashed mt-8 mb-5">

        </div>
        <!--end::Separator-->
        <!--begin::Nav-->
        <!--end::Nav-->
        <!--begin::Separator-->
    </div>
    <!--end::Content-->
</div>
<!-- end::User Panel-->
<!--begin::Quick Cart-->

<div id="kt_quick_cart" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
        <h4 class="font-weight-bold m-0 modal-title"></h4>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_cart_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content">
        <!--begin::Wrapper-->
        <div class="offcanvas-wrapper mb-5 scroll-pull create-modal">

        </div>
    </div>
    <!--end::Content-->
</div>


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

<div id="kt_quick_panel" class="offcanvas offcanvas-right p-8">
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
        <h4 class="font-weight-bold m-0 modal-title3 modal-title1 ml-3"></h4>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_panel_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <div class="tab-content">
        <!--begin::Tabpane-->
        <div class="tab-pane active show p-3" id="topbar_notifications_notifications" role="tabpanel">
            <!--begin::Scroll-->
            <div class="scroll update-modal" data-scroll="true" data-height="600" data-mobile-height="600">

            </div>
            <!--end::Scroll-->
        </div>
    </div>
</div>


<div id="kt_demo_panel" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
        <h4 class="font-weight-bold ml-3 modal-title"></h4>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_demo_panel_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content">
        <!--begin::Wrapper-->
        <div class="offcanvas-wrapper p-3 scroll-pull right-modal-all">
        </div>
        <!--end::Wrapper-->
        <!--begin::Purchase-->
        <div class="offcanvas-footer">
        </div>
        <!--end::Purchase-->
    </div>
    <!--end::Content-->
</div>

<div id="kt_demo_panel1" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
        <h4 class="font-weight-bold ml-3 modal-title1"></h4>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_demo_panel_close1">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content">
        <!--begin::Wrapper-->
        <div class="offcanvas-wrapper p-3 scroll-pull right-modal-all1">

        </div>
        <!--end::Wrapper-->
        <!--begin::Purchase-->
        <div class="offcanvas-footer">
        </div>
        <!--end::Purchase-->
    </div>
    <!--end::Content-->
</div>


<!-- Modal-->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<?php

$message = message();
// echo "<pre>";print_r($message['message']);die;
$status = $message['status'];
$message = $message['message'];
$js = <<<JS
    let messages = '$message';
    let status = '$status';
    if (status !== 'false') {
        Swal.fire(messages, status, status);
    }
JS;

$this->registerJs($js, View::POS_LOAD);
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

