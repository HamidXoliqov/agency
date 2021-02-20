<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \app\modules\admin\models\Users;
use app\modules\subsidy\models\Appeal;
use app\models\BaseModel;
use yii\helpers\Url;
use \app\modules\subsidy\models\StatusTimeline;
use \app\modules\manuals\models\AppealStatus;
use yii\helpers\ArrayHelper;
use app\modules\subsidy\models\ProjectSubsidy;
use app\modules\subsidy\models\ProjectSubsidyWork;
use app\modules\subsidy\models\AppealAttachment;
use yii\widgets\ActiveForm;



/* @var $this yii\web\View */
/* @var $appeal app\modules\subsidy\models\Appeal */
/* @var $statuses app\modules\subsidy\models\StatusTimeline[] */

$prop = 'name_'.Yii::$app->language;
$contragent = $appeal->contragent;
$project = $appeal->projectSubsidy;
$status = $appeal->appealStatus;
$works = $project->projectSubsidyWorks;

$appealStatuses = ArrayHelper::map(AppealStatus::find()->all(), 'id', $prop);

$status_colors = [
    1 => ' label-light-primary',
    2 => ' label-light-info',
    3 => ' label-light-success',
    4 => ' label-light-danger',
    5 => ' label-light-primary',
    6 => ' label-light-danger',
    7 => ' label-light-success',
    8 => ' label-light-primary',
];
$status_color_names = [
    1 => 'primary',
    2 => 'info',
    3 => 'success',
    4 => 'danger',
    5 => 'primary',
    6 => 'danger',
    7 => 'success',
    8 => 'primary',
];
$bg_badges = [
    1 => ' bg-primary',
    2 => ' bg-info',
    3 => ' bg-success',
    4 => ' bg-danger',
    5 => ' bg-primary',
    6 => ' bg-danger',
    7 => ' bg-success',
    8 => ' bg-primary',
];

$sumWork = new ProjectSubsidyWork();
$sumWork->setAttributes([
    'work_name' => 'ЖАМИ:',
    'price' => 0,
    'self_finance_sum' => 0,
    'subsidy_sum' => 0,
    'credit_sum' => 0,
]);
foreach($works as $w) {
    $sumWork->price += $w->price;
    $sumWork->self_finance_sum += $w->self_finance_sum;
    $sumWork->subsidy_sum += $w->subsidy_sum;
    $sumWork->credit_sum += $w->credit_sum;
}
// vdd($sumWork->price);

//print_r($project); exit;
$this->title = $contragent->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appeals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<!--begin::Card-->
<div class="card card-custom gutter-b">
    <div class="card-body">
        <div class="d-flex">
            <!--begin: Pic-->
            <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                    <span class="font-size-h3 symbol-label font-weight-boldest"> </span>
                </div>
            </div>
            <!--end: Pic-->
            <!--begin: Info-->
            <div class="flex-grow-1">
                <!--begin: Title-->
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                    <div class="mr-3">
                        <!--begin::Name-->
                        <a href="<?php echo Url::to('index') ?>" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3" style="justify-content: center;">
                            <?=$contragent->name?>
                        </a>
                        <!--end::Name-->
                        <!--begin::Contacts-->
                        <div class="d-flex flex-wrap my-2">
                            <a href="tel:<?=$contragent->tel?>" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                    <span class="flaticon2-phone"></span>
                                </span>
                                <?=$contragent->tel?>
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
                                <?=$contragent->director?>
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
                                <?=$contragent->address?>
                            </a>
                        </div>
                        <!--end::Contacts-->
                    </div>
                    <div class="hide my-lg-0 my-1">
                        <a href="#" class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3">Reports</a>
                        <a href="#" class="btn btn-sm btn-info font-weight-bolder text-uppercase">New Task</a>
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
                    <i class="flaticon-pie-chart icon-2x text-muted font-weight-bold"></i>
                </span>
                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm"  data-container="body" data-toggle="popover" data-placement="top" data-content="Лойиҳанинг умумий қиймати">Лойиҳа қиймати</span>
                    <span class="font-weight-bolder font-size-h5">
                    <?=number_format($project->project_all_price, 2, '.', ' ') ?> млн сўм</span>
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
                    <?=number_format($project->counter_ga, 0, '', ' ') . ' '?> га</span>
                </div>
            </div>
            <!--end: Item-->
            <!--begin: Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                <span class="mr-4">
                    <i class="flaticon-file-2 icon-2x text-muted font-weight-bold"></i>
                </span>
                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm" data-container="body" data-toggle="popover" data-placement="top" data-content="Яратиладиган иш жойи">Иш жойи</span>
                    <span class="font-weight-bolder font-size-h5">
                    <?=number_format($project->job_count, 0, '', ' ') . ' '?> киши</span>
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
                    <?=$project->end_date?></span>
                </div>
            </div>
            <!--end: Item-->

        </div>
        <!--begin: Items-->
    </div>
</div>



<!--begin::Advance Table Widget 3-->
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">Амалга ошириладиган ишлар</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm"> </span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-0 pb-3">
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-bordered table-head-custom table-head-bg table-vertical-center">
                <thead>
                <tr class="text-uppercase">
                    <th style="width: 60px" class="pl-5">
                        <span class="text-dark-75">Т/р</span>
                    </th>
                    <th style="width: 350px" class="text-dark-75 pl-7">
                        <span class="text-dark-75">Амалга ошириладиган ишлар</span>
                    </th>
                    <th style="width: 150px">
                        <span class="text-dark-75">Лойиҳанинг умумий қиймати, млн сўм, ундан:</span>
                    </th>
                    <th style="width: 150px">
                        <span class="text-dark-75">Лойиҳа ташаббускор-ларининг маблағлари</span>
                    </th>
                    <th style="width: 150px">
                        <span class="text-dark-75">Виночиликни ривожлантириш жамғармаси субсидиялари</span>
                    </th>
                    <th style="width: 150px">
                        <span class="text-dark-75">Тижорат банклари кредитлари, жумладан, Жамғарма ресурслари ҳисобига</span>
                    </th>
                </tr>
                </thead>

                <tbody>
                <?php foreach($works as $key => $value): ?>

                    <tr>
                        <td style="width: 60px; " class="text-dark-75 pl-5">
                            <span class="text-dark-75"><?=($key+1)?></span>
                        </td>
                        <td class="pl-0 py-7">
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg pr-5"><?=$value->work_name?></span>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?= number_format($value->price,2,'.',' ')?></span>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=number_format($value->self_finance_sum,2,'.',' ')?></span>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?= number_format($value->subsidy_sum,2,'.',' ')?></span>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?= number_format($value->credit_sum,2,'.',' ')?></span>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <tr>
                    <td style="width: 60px; " class="pl-5">
                        <span class="text-dark-75">&nbsp;</span>
                    </td>
                    <td class="pl-0 py-7">
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$sumWork->work_name?></span>
                    </td>
                    <td>
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?= number_format($sumWork->price,2,'.',' ')?></span>
                    </td>
                    <td>
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?= number_format($sumWork->self_finance_sum,2,'.',' ')?></span>
                    </td>
                    <td>
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?= number_format($sumWork->credit_sum,2,'.',' ')?></span>
                    </td>
                    <td>
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?= number_format($sumWork->credit_sum,2,'.',' ') ?></span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!--end::Table-->
    </div>
    <!--end::Body-->
</div>
<!--end::Advance Table Widget 3-->


<!--begin::List Widget 1-->
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark"><?=Yii::t('app-msg', 'Attached documents')?> (<?=count($appeal->appealAttachments)?>)</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm"> </span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-3">
        <?php foreach($appeal->appealAttachments as $appatt) : $attach = $appatt->attachment;  //vdd($appatt);?>
            <!--begin::Item-->
            <div class="d-flex align-items-center mb-2">
                <!--begin::Symbol-->
                <div class="symbol symbol-40 symbol-light-primary mr-5">
                    <span class="flaticon-clipboard symbol-label" style="font-size:35px;"></span>
                </div>
                <!--end::Symbol-->
                <!--begin::Text-->
                <div class="d-flex flex-column font-weight-bold">
                    <a href="<?=Url::to(['/'.$attach->path])?>" target="_blank" class="text-dark text-hover-primary mb-1 font-size-lg">
                        <?=AppealAttachment::getAttachDocName($appatt->type)?>
                        <?php if (!empty($appatt->attachment_id)){
                            echo '<span class="svg-icon svg-icon-primary svg-icon-2x">
                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Done-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                    <path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>';
                        } else {
                            echo '<span class="svg-icon svg-icon-danger svg-icon-2x">
                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Error-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                    <path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>';
                        }?> 
                    </a>
                    <span class="text-muted"> </span>
                </div>
                <!--end::Text-->
            </div>
            <!--end::Item-->
        <?php endforeach; ?>

        <?php if(count($appeal->appealAttachments) == 0) : ?>
            <!--begin::Item-->
            <div class="d-flex align-items-center mb-2">
                <!--begin::Symbol-->
                <div class="symbol symbol-40 symbol-light-warning mr-5">
                    <span class="flaticon-questions-circular-button symbol-label" style="font-size:35px;"></span>
                </div>
                <!--end::Symbol-->
                <!--begin::Text-->
                <div class="d-flex flex-column font-weight-bold">
                    <i><?=Yii::t('app-msg', 'Attached documents not found.')?></i>
                    <span class="text-muted"> </span>
                </div>
                <!--end::Text-->
            </div>
            <!--end::Item-->
        <?php endif; ?>
    </div>
    <!--end::Body-->
</div>
<!--end::List Widget 1-->

<!--begin::List Widget 1-->
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark"><?=Yii::t('app-msg', 'Appeal status')?></span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm"> </span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-3">
        <!--begin::Item-->
        <div class="d-flex align-items-center mb-2">
            <!--begin::Symbol-->
            <div class="symbol symbol-40 symbol-light-<?=$status_color_names[$appeal->appeal_status]?> mr-5">
                <span class="flaticon-layer symbol-label" style="font-size:35px;"></span>
            </div>
            <!--end::Symbol-->
            <!--begin::Text-->
            <div class="d-flex flex-column font-weight-bold">
                <i class="label label-inline font-weight-bolder <?=$status_colors[$appeal->appeal_status]?>" style="font-size:1.25rem;"><?=$appealStatuses[$appeal->appeal_status]?></i>
                <span class="text-muted"> </span>
            </div>
            <!--end::Text-->

            <!--begin::Symbol-->
            <div class="symbol symbol-25 symbol-light-info ml-5">
                <span class="flaticon-user symbol-label" style="font-size:22px;"  data-container="body" data-toggle="popover" data-placement="top" data-content="<?=$appeal->statusBy ? $appeal->statusBy->fullname : ""?>"></span>
            </div>
            <!--end::Symbol-->
        </div>
        <!--end::Item-->
    </div>
    <!--end::Body-->
</div>
<!--end::List Widget 1-->

<!-- Button trigger modal-->
<?php if($appeal->appeal_status == AppealStatus::APPEAL_NEW): ?>
        <input id="appeal-send-id" type="hidden" value="<?=$appeal->id?>" />
        <input id="appeal-send-status" type="hidden" value="<?=AppealStatus::APPEAL_NEW?>" />        
        <div class="col-xl-3">
            <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/asset/media/svg/shapes/abstract-1.svg)">
                <div class="card-body">
                    <span class="svg-icon svg-icon-2x svg-icon-info">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                    </g>
                        </svg>
                    </span>
                    <span class="card-title font-weight-bolder text-dark-75 font-size-h5-md mb-0 mt-6 d-block">
                        <?=$contragent->director?>
                    </span>
                    <div class="font-weight-bold text-muted font-size-sm mb-2">
                        502119049
                    </div>
                    <div class="font-weight-bold text-muted font-size-sm mb-2">
                        Физическое лицо
                    </div>
                    <button type="button" onclick="sendNewStatus(event);" class="btn btn-primary">
                        <i class="fa fa-check"></i>
                            &nbsp;Агентликка юбориш
                    </button>
                </div>
            </div>
        </div>
<?php endif; ?>

<!-- Button trigger modal-->
<?php if($appeal->appeal_status == AppealStatus::APPEAL_AGENCY_RETURNED): ?>
    <input id="appeal-agency-send-id" type="hidden" value="<?=$appeal->id?>" />
    <input id="appeal-agency-send-status" type="hidden" value="<?=AppealStatus::APPEAL_AGENCY_RETURNED?>" />

    <button type="button" class="btn btn-danger" onclick="sendAgencyStatus(event);">
        Лойиҳани қайта агентликка юбориш
    </button>
<?php endif; ?>

<!-- via esi kluch imzolash start -->

<?php if ($errorMsg) : ?>
    <div class="alert">
        <div class="alert  alert-custom alert-danger" role="alert">
            <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
            <div class="alert-text"><?php echo $errorMsg; ?></div>
        </div>
    </div>
<?php endif ?>

    <div id="message" class="d-flex flex-center"></div>
    <form name="eri_form" method="post" action="">
        <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
        <select name="key"
                onchange="cbChanged(this)"
                class="hidden"></select>
        <input type="hidden" name="fio" id="fio">
        <input type="hidden" name="serial" id="uid">
        <input type="hidden" name="tin" id="tin">
        <input type="hidden" id="keyId" name="keyId">
        <textarea name="pkcs7" id="pkcs7" class="hidden"></textarea>
    </form>
    <div class="row" id="esi_keys"></div>

<!-- via esi kluch imzolash end -->

<script>
    function getCsrfData() {
        let param = $("head meta[name=csrf-param]").attr("content");
        let value = $("head meta[name=csrf-token]").attr("content");
        let data = {};
        data[param] = value;
        return data;
    }

    function sendNewStatus(e) {
        let data = getCsrfData();
        data['appeal-id'] = $("#appeal-send-id").val();
        data['status'] = $("#appeal-send-status").val();
        $.ajax({
            url: 'appeal-send-agency',
            data: data,
            type: 'POST',
            success: function(response) {
                if(response.message) {
                    alert(response.message);
                }
                if(response.refresh == 1) {
                    document.location = document.location;
                } else if(response.result == 1) {
                    $("#acceptAppealModal").modal("hide");
                }
            },
            error: function(error) {
                alert(error);
            }
        });
    }

    function sendAgencyStatus(e) {
        let data = getCsrfData();
        data['appeal-id'] = $("#appeal-agency-send-id").val();
        data['status'] = $("#appeal-agency-send-status").val();
        $.ajax({
            url: 'appeal-send-agency',
            data: data,
            type: 'POST',
            success: function(response) {
                if(response.message) {
                    alert(response.message);
                }
                if(response.refresh == 1) {
                    document.location = document.location;
                } else if(response.result == 1) {
                    $("#acceptAppealModal").modal("hide");
                }
            },
            error: function(error) {
                alert(error);
            }
        });
    }
</script>

<?php

$this->registerJsVar('fizlitso',  Yii::t('app', "Individual entity"));
$this->registerJsVar('yurlitso',  Yii::t('app', "Legal Entity"));
$this->registerJsVar('expireMessage',  Yii::t('app', "Your Certificate expired "));
$this->registerJsVar('btnChoose',  Yii::t('app', "Лойиҳани имзолаш"));

$js = <<<JS

  var EIMZO_MAJOR = 3;
  var EIMZO_MINOR = 37;


  var errorCAPIWS = 'Ошибка соединения с E-IMZO. Возможно у вас не установлен модуль E-IMZO или Браузер E-IMZO.';
  var errorBrowserWS = 'Браузер не поддерживает технологию WebSocket. Установите последнюю версию браузера.';
  var errorUpdateApp = 'ВНИМАНИЕ !!! Установите новую версию приложения E-IMZO или Браузера E-IMZO.<br /><a href="https://e-imzo.uz/main/downloads/" role="button">Скачать ПО E-IMZO</a>';
  var errorWrongPassword = 'Пароль неверный.';


  var AppLoad = function () {
    EIMZOClient.API_KEYS = [
      'localhost', '96D0C1491615C82B9A54D9989779DF825B690748224C2B04F500F370D51827CE2644D8D4A82C18184D73AB8530BB8ED537269603F61DB0D03D2104ABF789970B',
      '127.0.0.1', 'A7BCFA5D490B351BE0754130DF03A068F855DB4333D43921125B9CF2670EF6A40370C646B90401955E1F7BC9CDBF59CE0B2C5467D820BE189C845D0B79CFC96F',
      'null',      'E0A205EC4E7B78BBB56AFF83A733A1BB9FD39D562E67978CC5E7D73B0951DB1954595A20672A63332535E13CC6EC1E1FC8857BB09E0855D7E76E411B6FA16E9D',
    ];
    uiLoading();
    EIMZOClient.checkVersion(function(major, minor){
      var newVersion = EIMZO_MAJOR * 100 + EIMZO_MINOR;
      var installedVersion = parseInt(major) * 100 + parseInt(minor);
      if(installedVersion < newVersion) {
        uiUpdateApp();
      } else {
        EIMZOClient.installApiKeys(function(){
          uiLoadKeys();
        },function(e, r){
          if(r){
            uiShowMessage(r);
          } else {
            wsError(e);
          }
        });
      }
    }, function(e, r){
      if(r){
        uiShowMessage(r);
      } else {
        uiNotLoaded(e);
      }
    });
  }
  
  var isLegalEntity = function (tin) {
    return (tin.charAt(0) === '2' || tin.charAt(0) === '3');
  };


  var uiShowMessage = function(message){
    alert(message);
  }

  var uiLoading = function(){
    var l = document.getElementById('message');
    l.innerHTML = 'Загрузка ...';
    l.style.color = 'red';
  }

  var uiNotLoaded = function(e){
    var l = document.getElementById('message');
    l.innerHTML = '';
    if (e) {
      wsError(e);
    } else {
      uiShowMessage(errorBrowserWS);
    }
  }

  var uiUpdateApp = function(){
    var l = document.getElementById('message');
    l.innerHTML = errorUpdateApp;
  }

  var uiLoadKeys = function(){
    uiClearCombo();
    EIMZOClient.listAllUserKeys(function(o, i){
      var itemId = o.serialNumber;
      return itemId;
    },function(itemId, v){
        //var uiItem = uiCreateItem(itemId, v);
      return uiCreateItem(itemId, v);
    },function(items, firstId){
      uiFillCombo(items);
      uiLoaded();
      uiComboSelect(firstId);
    },function(e, r){
      uiShowMessage(errorCAPIWS);
    });
  }

  var uiComboSelect = function(itm){
    if(itm){
      var id = document.getElementById(itm);
      id.setAttribute('selected','true');
    }
  }

  var cbChanged = function(c){
    document.getElementById('keyId').innerHTML = '';
  }

  var uiClearCombo = function(){
    var combo = document.eri_form.key;
    combo.length = 0;
    document.getElementById('esi_keys').innerHTML = '';
  }

  var uiFillCombo = function(items){
    var combo = document.eri_form.key;
    for (var itm in items) {
      combo.append(items[itm].itm);
      document.getElementById('esi_keys').innerHTML += items[itm].card;
    }
  }

  var uiLoaded = function(){
    var l = document.getElementById('message');
    l.innerHTML = '';
  }

  var uiCreateItem = function (itmkey, vo) {
    var returnableVal = {};
    var card = '<div class="col-xl-3">' +
     '<div class="card card-custom bgi-no-repeat card-stretch gutter-b" ' +
      'style="background-position: right top; background-size: 30% auto; background-image: url(/asset/media/svg/shapes/abstract-1.svg)">' +
       '<div class="card-body"><span class="svg-icon svg-icon-2x svg-icon-info">' +
        '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24" /><path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" /><path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" /></g></svg>' +
         '</span>';
    var btn = '';
    var now = new Date();
    vo.expired = dates.compare(now, vo.validTo) > 0;
    var itm = document.createElement("option");
    itm.value = itmkey;
    itm.text = vo.CN;
    card += '<span class="card-title font-weight-bolder text-dark-75 font-size-h5-md mb-0 mt-6 d-block">' +
     vo.CN +
      '</span>';
    card += '<div class="font-weight-bold text-muted font-size-sm mb-2">' +
     vo.TIN +
      '</div>';
    card += '<div class="font-weight-bold text-muted font-size-sm mb-2">' +
     (isLegalEntity(vo.TIN) ? yurlitso : fizlitso) +
      '</div>';
    
    if (vo.O) {
         card += '<div class="font-weight-bold text-muted font-size-sm mb-2">' +
         vo.O +
          '</div>';
    }
    
    if (!vo.expired) {
        btn = '<button type="button" onclick="chooseTheKey(\''+ itmkey +'\')" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp;' +
            btnChoose + 
         '</button>';
    } else {
        card += '<div class="text-danger font-size-sm mb-2">' +
         expireMessage + vo.validTo.ddmmyyyy() +
          '</div>';
      itm.style.color = 'gray';
      itm.text = itm.text + ' (срок истек)';
    }
    
    card += btn;
    itm.setAttribute('vo',JSON.stringify(vo));
    itm.setAttribute('id',itmkey);
    returnableVal.itm = itm;
    returnableVal.card = card;
    //console.log(vo);
    return returnableVal;
  }

  var wsError = function (e) {
    if (e) {
      uiShowMessage(errorCAPIWS + " : " + e);
    } else {
      uiShowMessage(errorBrowserWS);
    }
  };
  
  var sign = function (itemId) {
    var formKey = document.eri_form.key;
    //console.log(formKey); return false;
    formKey.value = itemId;
    var itm = formKey.value;
    if (itm) {
      var id = document.getElementById(itm);
      var vo = JSON.parse(id.getAttribute('vo'));
      var data = 'authUser' + (Math.random()*1000);
      var keyId = document.getElementById('keyId').innerHTML;
      //console.log(vo);return false;
      if (vo.expired) {
          alert('Your Key is expired');
          return false;
      }
      document.getElementById('fio').value = vo.CN;
      document.getElementById('uid').value = vo.UID;
      document.getElementById('tin').value = vo.TIN;
      if(keyId){
        EIMZOClient.createPkcs7(keyId, data, null, function(pkcs7){
          document.eri_form.pkcs7.value = pkcs7;
        }, function(e, r){
          if(r){
            if (r.indexOf("BadPaddingException") != -1) {
              uiShowMessage(errorWrongPassword);
            } else {
              uiShowMessage(r);
            }
          } else {
            document.getElementById('keyId').innerHTML = '';
            uiShowMessage(errorBrowserWS);
          }
          if(e) wsError(e);
        });
      } else {
        EIMZOClient.loadKey(vo, function(id){
          document.getElementById('keyId').value = id;
          EIMZOClient.createPkcs7(id, data, null, function(pkcs7){
            document.eri_form.pkcs7.value = pkcs7;
            //console.log(vo); return false;
            if (document.eri_form.pkcs7.value) {
                document.eri_form.submit();
            }
          }, function(e, r){
            if(r){
              if (r.indexOf("BadPaddingException") != -1) {
                uiShowMessage(errorWrongPassword);
              } else {
                uiShowMessage(r);
              }
            } else {
              document.getElementById('keyId').innerHTML = '';
              uiShowMessage(errorBrowserWS);
            }
            if(e) wsError(e);
          });
        }, function(e, r){
          if(r){
            if (r.indexOf("BadPaddingException") != -1) {
              uiShowMessage(errorWrongPassword);
            } else {
              uiShowMessage(r);
            }
          } else {
            uiShowMessage(errorBrowserWS);
          }
          if(e) wsError(e);
        });
      }
    } else {
        alert('Choose the key');
    }
  };
  
  var chooseTheKey = function(item) {
      sign(item);
  };

  window.onload = AppLoad;
JS;

$css = <<<CSS
    .hidden {
     display: none;
    }
CSS;



$this->registerJsFile("/esi/e-imzo.js");
$this->registerJsFile("/esi/e-imzo-client.js");
$this->registerJs($js, \yii\web\View::POS_END);
$this->registerCss($css);