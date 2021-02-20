<?php
/**@var $this View */
use app\components\MenuActivate;
use yii\helpers\Url;
use app\components\PermissionHelper as P;
use yii\web\View;

$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;
$module = Yii::$app->controller->module->id;

$slug = $this->context->slug ?? null;

/* @var $user \app\modules\admin\models\Users*/
$user = Yii::$app->user->identity;
?>
<style>
    .hide {
        display:none!important;
    }
</style>
<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
         data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav main_li">
            <li class="menu-item menu-item-submenu <?= MenuActivate::controllers('user') ?> " aria-haspopup="true"
                data-menu-toggle="hover">
                <a href="javascript:" class="menu-link menu-toggle left_breadcrumb">
                    <i class="menu-icon flaticon-app"></i>
                    <span class="menu-text"><?= Yii::t('app', 'Account') ?></span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item <?= MenuActivate::actions('user/mypage') ?> " aria-haspopup="true">
                            <a href="<?= Url::to(['/user/mypage']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'My page') ?></span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item <?= MenuActivate::actions('user/department') ?> <?php if ($user->department_id == null) {
                            echo 'offcanvas';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/user/department']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'Department') ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
<!-- 
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item <?php // echo MenuActivate::actions('user/appeals') ?> <?php // if (!$user->isContragent()) {
                          //  echo 'offcanvas';} ?>" aria-haspopup="true">
                            <a href="<?php // echo Url::to(['/user/appeals']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?php // echo Yii::t('app', 'Appeals') ?></span>
                            </a>
                        </li>
                    </ul>
                </div> -->
            </li>


            <li class="menu-item menu-item-submenu <?= MenuActivate::modules('project') ?> " aria-haspopup="true"
                data-menu-toggle="hover">
                <a href="javascript:" class="menu-link menu-toggle left_breadcrumb">
                    <i class="menu-icon flaticon-app"></i>
                    <span class="menu-text"><?= Yii::t('app', 'Управления проектами') ?></span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item  <?= MenuActivate::controllers('project') ?> <?php if (!P::can('project/index')) {
                            echo 'offcanvas';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/project/project/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'All projects') ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item menu-item-submenu <?= MenuActivate::modules('subsidy') ?> " aria-haspopup="true"
                data-menu-toggle="hover">
                <a href="#" class="menu-link menu-toggle left_breadcrumb">
                    <i class="menu-icon flaticon2-percentage "></i>
                    <span class="menu-text"><?= Yii::t('app', 'Управления субсидиями') ?></span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">

                        <li class="menu-item <?= MenuActivate::controllers('agency') ?> <?php if (!$user->isAgency()) {
                            echo 'offcanvas';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/subsidy/agency/appeals']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'Appeals') ?></span>
                            </a>
                        </li>

                        <li class="menu-item <?= MenuActivate::controllers('subsidy-protocol') ?> <?php if (!$user->isAgency()) {
                            echo 'offcanvas';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/subsidy/subsidy-protocol/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'Subsidy protocols') ?></span>
                            </a>
                        </li>

                        <li class="menu-item  <?= MenuActivate::controllers('appeal') ?> <?php if (!P::can('appeal/index')) {
                            echo 'offcanvas';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/subsidy/appeal/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app-msg', 'Contragent appeal') ?></span>
                            </a>
                        </li>

                        <li class="menu-item  <?= MenuActivate::controllers('appeal-protocol') ?> <?php if (!P::can('appeal-protocol/index')) {
                            echo 'offcanvas';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/subsidy/appeal-protocol/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app-msg', 'Appeal protocol') ?></span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="menu-item menu-item-submenu coming-soon <?= MenuActivate::modules('projectergasd') ?> " aria-haspopup="true"
                data-menu-toggle="hover">
                <a href="#" class="menu-link menu-toggle left_breadcrumb">
                    <i class="menu-icon ml-1 fas fa-wine-glass-alt"></i>
                    <span class="menu-text"><?= Yii::t('app', 'Распределение спиртов') ?></span>
                    <i class="menu-arrow"></i>
                </a>
<!--                <div class="menu-submenu">-->
<!--                    <i class="menu-arrow"></i>-->
<!--                    <ul class="menu-subnav">-->
<!--                        <li class="menu-item  --><?//= MenuActivate::controllers('project') ?><!-- --><?php //if (!P::can('project/index')) {
//                            echo 'offcanvas';
//                        } ?><!--" aria-haspopup="true">-->
<!--                            <a href="--><?//= Url::to(['/project/project/index']); ?><!--" class="menu-link">-->
<!--                                <i class="menu-bullet menu-bullet-dot">-->
<!--                                    <span></span>-->
<!--                                </i>-->
<!--                                <span class="menu-text">--><?//= Yii::t('app', 'All projects') ?><!--</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
            </li>

            <!--<li class="menu-item menu-item-submenu <?php /*if (
                strlen(MenuActivate::controllers('transaction')) == 0 &&
                strlen(MenuActivate::controllers('department-area')) == 0 &&
                strlen(MenuActivate::controllers('item-balance')) == 0 &&
                strlen(MenuActivate::controllers('transaction-payments')) == 0

            ) {
                echo MenuActivate::modules('warehouse');
            } */?>" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:" class="menu-link menu-toggle left_breadcrumb">
                    <i class="menu-icon flaticon-home"></i>
                    <span class="menu-text"><?/*= Yii::t('app', 'Warehouse management') */?></span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">

                    <ul class="menu-subnav">

                        <li class="menu-item menu-item-submenu <?/*= MenuActivate::controllers('item-category', 'item') */?> "
                            aria-haspopup="true"
                            data-menu-toggle="hover">
                            <a href="javascript:" class="menu-link menu-toggle">
                                <i class="menu-icon flaticon2-open-box"></i>
                                <span class="menu-text"><?/*= Yii::t('app', 'Products'); */?></span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu">
                                <i class="menu-arrow"></i>
                                <ul class="menu-subnav">


                                    <li class="menu-item <?/*= MenuActivate::controllers('item-category') */?> <?php /*if (!P::can('item-category/index')) {
                                        echo 'offcanvas';
                                    } */?>" aria-haspopup="true">
                                        <a href="<?/*= Url::to(['/warehouse/item-category/index']); */?>"
                                           class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text"><?/*= Yii::t('app', 'Product сategories') */?></span>
                                        </a>
                                    </li>


                                    <li class="menu-item <?/*= MenuActivate::controllers('item') */?> <?php /*if (!P::can('item/index')) {
                                        echo 'offcanvas';
                                    } */?>" aria-haspopup="true">
                                        <a href="<?/*= Url::to(['/warehouse/item/index']); */?>"
                                           class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text"><?/*= Yii::t('app', 'Products list') */?></span>
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
            </li>-->

            <li class="menu-item menu-item-submenu <?= MenuActivate::modules('admin', 'structure') ?> <?php if (!strlen(MenuActivate::controllers('department-area')) == 0) {
                echo MenuActivate::modules('warehouse');
            } ?>" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:" class="menu-link menu-toggle left_breadcrumb">
                    <i class="menu-icon flaticon2-browser-1"></i>
                    <span class="menu-text"><?= Yii::t('app', 'Organization Structure'); ?></span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">

                        <li class="menu-item <?= MenuActivate::controllers('department') ?> <?php if (!P::can('department/index')) {
                            echo 'offcanvas';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/structure/department/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'Department'); ?></span>
                            </a>
                        </li>

                        <li class="menu-item <?= MenuActivate::controllers('org-classification') ?> <?php if (!P::can('department/index')) {
                            echo 'offcanvas';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/structure/org-classification/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'Org Classification'); ?></span>
                            </a>
                        </li>

                        <li class="menu-item <?= MenuActivate::controllers('department-area') ?> <?php if (!P::can('department-area/index')) {
                            echo 'offcanvas';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/warehouse/department-area/index']); ?>"
                               class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'Department Area') ?></span>
                            </a>
                        </li>

                        <li class="menu-item <?= MenuActivate::controllers('users') ?> offcanvas" aria-haspopup="true">
                            <a href="<?= Url::to(['/admin/users/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'Users'); ?></span>
                            </a>
                        </li>

                        <li class="menu-item <?= MenuActivate::controllers('employee') ?> <?php if (!P::can('users/index')) {
                            echo 'offcanvas';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/admin/employee/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'Employee'); ?></span>
                            </a>
                        </li>
                        <!--<li class="menu-item <?/*= MenuActivate::controllers('user-department') */?> <?php /*if (!P::can('user-department/index')) {
                            echo 'offcanvas';
                        } */?>" aria-haspopup="true">
                            <a href="<?/*= Url::to(['/admin/user-department/index']); */?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?/*= Yii::t('app', 'User department'); */?></span>
                            </a>
                        </li>-->

                        <li class="menu-item <?= MenuActivate::controllers('auth-item') ?> <?php if (!P::can('auth-item/index')) {
                            echo 'offcanvas';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/admin/auth-item/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'Rules') ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item menu-item-submenu <?= MenuActivate::modules('manuals') ?> " aria-haspopup="true"
                data-menu-toggle="hover">
                <a href="javascript:" class="menu-link menu-toggle left_breadcrumb">
                    <i class="menu-icon flaticon2-layers-2"></i>
                    <span class="menu-text"><?= Yii::t('app', 'Справочники') ?></span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item <?= MenuActivate::controllers('references-type') ?> <?= MenuActivate::controllers('references') ?> <?php if (!P::can('references-type/index')) {
                            echo 'offcanvas';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/manuals/references-type/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'References') ?></span>
                            </a>
                        </li>

                        <li class="menu-item  <?= MenuActivate::controllers('item-references') ?> <?php if (!P::can('item-references/index')) {
                            echo '';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/manuals/item-references/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'Item models') ?></span>
                            </a>
                        </li>

                        <li class="menu-item  <?= MenuActivate::controllers('auto-transport') ?> <?php if (!P::can('auto-transport/index')) {
                            echo '';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/manuals/auto-transport/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'Auto transport') ?></span>
                            </a>
                        </li>

                        <li class="menu-item  <?= MenuActivate::controllers('plant-schema') ?> <?php if (!P::can('plant-schema/index')) {
                            echo '';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/manuals/plant-schema/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'Plant schema') ?></span>
                            </a>
                        </li>

                        <li class="menu-item  <?= MenuActivate::controllers('nav-type') ?> <?php if (!P::can('nav-type/index')) {
                            echo '';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/manuals/nav-type/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'Grape nav type') ?></span>
                            </a>
                        </li>

                        <li class="menu-item  <?= MenuActivate::controllers('contragent-status') ?> <?php if (!P::can('contragent-status/index')) {
                            echo '';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/manuals/contragent-status/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'Contragent status') ?></span>
                            </a>
                        </li>

                        <li class="menu-item  <?= MenuActivate::controllers('appeal-type') ?> <?php if (!P::can('appeal-type/index')) {
                            echo '';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/manuals/appeal-type/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'Appeal type') ?></span>
                            </a>
                        </li>

                        <li class="menu-item  <?= MenuActivate::controllers('bank') ?> <?php if (!P::can('bank/index')) {
                            echo 'offcanvas';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/manuals/bank/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'Banks') ?></span>
                            </a>
                        </li>

                        <li class="menu-item <?= MenuActivate::controllers('regions') ?> <?php if (!P::can('regions/index')) {
                            echo 'offcanvas';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/manuals/regions/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'Regions') ?></span>
                            </a>
                        </li>


                        <li class="menu-item <?= MenuActivate::controllers('countries') ?> <?php if (!P::can('countries/index')) {
                            echo 'offcanvas';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/manuals/countries/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'Countries') ?></span>
                            </a>
                        </li>


                        <li class="menu-item <?= MenuActivate::controllers('license') ?> <?php if (!P::can('license/index')) {
                            echo 'offcanvas';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/manuals/license/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'License') ?></span>
                            </a>
                        </li>

                        <li class="menu-item  <?= MenuActivate::controllers('exchange-rate') ?> <?php if (!P::can('exchange-rate/index')) {
                            echo 'offcanvas';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/manuals/exchange-rate/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'Exchange Rate') ?></span>
                            </a>
                        </li>

                        <li class="menu-item <?= MenuActivate::controllers('contragent') ?> <?php if (!P::can('contragent/index')) {
                            echo 'offcanvas';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/manuals/contragent/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app', 'Contragent') ?></span>
                            </a>
                        </li>


                    </ul>
                </div>
            </li>


            <li class="menu-item menu-item-submenu <?= MenuActivate::modules('warehouse') ?> hide " aria-haspopup="true"
                data-menu-toggle="hover">
                <a href="javascript:" class="menu-link menu-toggle left_breadcrumb">
                    <i class="menu-icon flaticon-app"></i>
                    <span class="menu-text"><?= Yii::t('app-msg', 'Warehouse management') ?></span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item  <?= MenuActivate::controllers('item-category') ?> <?php if (!P::can('item-category/index')) {
                            echo 'offcanvas';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/warehouse/item-category/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app-msg', 'Item categories') ?></span>
                            </a>
                        </li>
                        <li class="menu-item  <?= MenuActivate::controllers('item') ?> <?php if (!P::can('item/index')) {
                            echo 'offcanvas';
                        } ?>" aria-haspopup="true">
                            <a href="<?= Url::to(['/warehouse/item/index']); ?>" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text"><?= Yii::t('app-msg', 'Items') ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>



<?php
// TODO coming soon lar tugasa olib tashlash mumkin
$this->registerJsVar('messages', [
    'coming_soon' => Yii::t('app', "Скоро будет"),
]);
$js = <<<JS
$(".coming-soon").click(function(e) {
    Swal.fire(messages.coming_soon, messages.coming_soon, "warning");
});
JS;
$this->registerJsFile("/js/sweetalert/sweetalert.js", ['depends' => "yii\bootstrap\BootstrapAsset"]);
$this->registerJs($js, View::POS_END);