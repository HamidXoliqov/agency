<?php

use app\modules\manuals\models\AppealStatus;
use app\modules\manuals\models\AppealType;
use app\modules\manuals\models\Contragent;
use app\modules\subsidy\models\Appeal;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\subsidy\models\AppealSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$lang_name = 'name_' . Yii::$app->language;

$this->title = Yii::t('app', 'Appeals protocol');
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Advance Table Widget 3-->
                <div class="card card-custom card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 py-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bolder text-dark">Умумий аризалар</span>
                            <span class="text-muted mt-3 font-weight-bold font-size-sm">
                                Жами лойиҳалар сони: <?= count($appeals) ?>
                            </span>
                        </h3>
                        <div class="card-toolbar">
                            <a href="<?= Url::to('create') ?>" class="btn btn-success font-weight-bolder font-size-sm">
                                <span class="svg-icon svg-icon-md svg-icon-white">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                Новый заявки
                            </a>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-0 pb-3">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                <thead>
                                    <tr class="text-uppercase">
                                        <th style="min-width: 250px" class="pl-7">
                                            <span class="text-dark-75">KONTRAGENT</span>
                                        </th>
                                        <th style="min-width: 100px">REGIONS</th>
                                        <th style="min-width: 100px">CREATED DATE</th>
                                        <th style="min-width: 150px">APPEAL TYPE</th>
                                        <th style="min-width: 100px">APPEAL STATUS</th>
                                        <th style="min-width: 150px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($appeals as $key => $value) : //vdd($value->contragent->name);
                                        switch ($value->appeal_status) {
                                            case '1':
                                                $data = 'label label-lg label-light-warning label-inline';
                                                break;
                                            case '2':
                                                $data = 'label label-lg label-light-primary label-inline';
                                                break;
                                            case '3':
                                                $data = 'label label-lg label-light-success label-inline';
                                                break;
                                            case '4':
                                                $data = 'label label-lg label-light-danger label-inline';
                                                break;
                                            default:
                                                $data = 'label label-lg label-light-primary label-inline';
                                                break;
                                        } ?>
                                        <tr>
                                            <td class="pl-0 py-8">
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                                    </div>
                                                    <div>
                                                        <a href="<?= Url::to('/subsidy/appeal/view?id=') . $value->id ?>" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                            <?= $value->contragent->name ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                    <?//= $region ?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                    <?= date('Y-m-d h:i:s', $value->created_at) ?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                    <?= $value->getAppealType()->$lang_name ?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="<?= $data ?>">
                                                    <?= $value->getAppealStatus()->$lang_name ?>
                                                </span>
                                            </td>
                                            <td class="text-right pr-0">
                                                <a href="<?= Url::to('view?id=') . $value->id ?>" class="btn btn-outline-info btn-xs" title="View">
                                                    <i class="la la-eye ml-1"></i>
                                                </a>
                                                <a href="<?= Url::to('appeal-document?id=') . $value->id ?>" class="btn btn-outline-warning  btn-xs" title="Document view">
                                                    <i class="la la-print ml-1"></i>
                                                </a>
                                                <?php if ($value->appeal_status == AppealStatus::APPEAL_NEW || $value->appeal_status == AppealStatus::APPEAL_AGENCY_RETURNED) : ?>
                                                    <a href="<?= Url::to('update?id=') . $value->id ?>" class="btn btn-outline-primary btn-xs" title="Update">
                                                        <i class="la la-pencil ml-1"></i>
                                                    </a>
                                                <?php endif ?>
                                                <?php if ($value->appeal_status == AppealStatus::APPEAL_NEW) : ?>
                                                    <a href="<?= Url::to('delete?id=') . $value->id ?>" class="btn btn-xs btn-outline-danger delete-button" title="Delete">
                                                        <i class="la la-trash ml-1"></i>
                                                    </a>
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Advance Table Widget 3-->
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->