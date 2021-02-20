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

$subsidy_sum = 0;
$subsidy_umumiy_ga = 0;
$subsidy_ish_urni = 0;
$subsidy_muddat = '';

foreach ($project_subsidy as $key => $value) {
    if (count($project_subsidy) == $key + 1) {
        $teg = '';
    } else {
        $teg = ' / ';
    }

    $subsidy_sum += $value->project_all_price;
    $subsidy_umumiy_ga += $value->counter_ga;
    $subsidy_ish_urni += $value->job_count;
    $subsidy_muddat .= $value->end_date . $teg;
}





$this->title = Yii::t('app', 'Appeals');
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container-fluid">
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
                                <a href="<?php echo Url::to('index') ?>" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3" style="justify-content: center;">
                                    <?php echo $contr_agent->name ?>
                                    <i class="flaticon2-correct text-success icon-md ml-2"></i>
                                </a>
                                <!--end::Name-->
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
                                        </span><?= $contr_agent->director ?></a>
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
                            <span class="font-weight-bolder font-size-sm" data-container="body" data-toggle="popover" data-placement="top" data-content="Лойиҳанинг умумий қиймати">Лойиҳа қиймати</span>
                            <span class="font-weight-bolder font-size-h5">
                                <span class="text-dark-50 font-weight-bold"></span>
                                <?= number_format($subsidy_sum, 2, '.', ' ') ?> млн сўм
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
                                <span class="text-dark-50 font-weight-bold"></span>
                                <?= number_format($subsidy_umumiy_ga, 0, '', ' ') . ' ' ?>га
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
                            <span class="font-weight-bolder font-size-sm" data-container="body" data-toggle="popover" data-placement="top" data-content="Яратиладиган умумий иш уринлри">Иш жойи</span>
                            <span class="font-weight-bolder font-size-h5">
                                <span class="text-dark-50 font-weight-bold">
                                </span>
                                <?= number_format($subsidy_ish_urni, 0, '', ' ') . ' ' ?> киши
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
                            <span class="font-weight-bolder font-size-sm" data-container="body" data-toggle="popover" data-placement="top" data-content="Лойиҳаларни амалга ошириш муддатлари">Лойиҳа муддатлари</span>
                            <span class="font-weight-bolder font-size-h5">
                                <?= $subsidy_muddat ?></span>
                        </div>
                    </div>
                    <!--end: Item-->
                </div>
                <!--begin: Items-->
            </div>
        </div>
        <!--end::Card-->
        <!--begin::Row-->
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Advance Table Widget 3-->
                <div class="card card-custom card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 py-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bolder text-dark">Умумий лойиҳалар</span>
                            <span class="text-muted mt-3 font-weight-bold font-size-sm">
                                Жами лойиҳалар сони: <?= count($project_subsidy) ?>
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
                                    <?php foreach ($appeals as $key => $value) :
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
                                                        <a href="<?= Url::to('view?id=') . $value->id ?>" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                            <?= $contr_agent->name ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                    <?= $region ?>
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