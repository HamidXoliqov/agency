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
use app\modules\subsidy\models\SubsidyProtocol;

/* @var $this yii\web\View */
/* @var $appeal app\modules\subsidy\models\Appeal */
/* @var $statuses app\modules\subsidy\models\StatusTimeline[] */

$prop = 'name_'.Yii::$app->language;
$contragent = $appeal->contragent;
$project = $appeal->projectSubsidy;
$department = $contragent->department;
$status = $appeal->appealStatus;
$type = $appeal->appealType;
$works = $project->projectSubsidyWorks;

/* @var $statusChanges StatusTimeline[] */
$statusChanges = StatusTimeline::find()->where(['appeal_id' => $appeal->id])->andFilterWhere(['>', 'status', AppealStatus::APPEAL_NEW])->orderBy(['action_time' => SORT_ASC])->all();

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


$status_change_accepts = [
    AppealStatus::APPEAL_SENT_TO_AGENCY => [
//        AppealStatus::APPEAL_AGENCY_ACCEPTED,
        AppealStatus::APPEAL_REFERRED_TO_COUNCIL,
        AppealStatus::APPEAL_AGENCY_RETURNED,
    ],
    AppealStatus::APPEAL_AGENCY_ACCEPTED => [
        AppealStatus::APPEAL_REFERRED_TO_COUNCIL,
    ],
    AppealStatus::APPEAL_REFERRED_TO_COUNCIL => [
        AppealStatus::APPEAL_COUNCIL_ACCEPTED,
        AppealStatus::APPEAL_COUNCIL_REFUSED,
    ],
    AppealStatus::APPEAL_COUNCIL_ACCEPTED => [
        AppealStatus::APPEAL_SUBSIDY_WAS_ALLOCATED,
    ],
];

$status_change_data = [
    AppealStatus::APPEAL_AGENCY_ACCEPTED => [
        'target' => 'acceptAppealModal',
        'title' => 'Accept appeal',
        'message' => 'Appeal is accepted.'
    ],
    AppealStatus::APPEAL_AGENCY_RETURNED => [
        'target' => 'returnAppealModal',
        'title' => 'Return appeal',
        'message' => 'Appeal is returned.'
    ],
];

//Temp data
$temp = false;
//$temp = true;
if($temp) {
    $statusChanges = [];
    $DAY = 24*3600;
    $ct = time();
    for($i=0; $i<8; $i++) {
        $stc = new StatusTimeline();
        $stc->comment = "Some changes,  Some changes,  Some changes,  Some changes,  Some changes";
        $stc->action_time = $ct - (7-$i)*($DAY+4000);
        $stc->status = $i + 1;
        $statusChanges[] = $stc;
    }
    /* @var $works ProjectSubsidyWork[]*/
    $works = [];
    $workNames = [
        "Агротехник тадбирлар (жумладан, ер ҳайдаш, чизеллаш, ерни текислаш ва ҳоказо ишларни амалга ошириш)",
        "Тупроққа минерал ўғитлар ва бошқа кимёвий моддалар билан ишлов бериш",
        "Саноатбоп узум ниҳолларини харид қилиш ва уларни ўтқазишни ташкил қилиш",
        "Сув чиқариш учун бурғилаш қудуқлари қуриш",
        "Томчилаб суғориш тизимини жорий қилиш",
        "Ток кўчатларини шпалерга кўтариш",
        "Бошқа харажатлар"
    ];
    for($i=0; $i<count($workNames); $i++) {
        $work = new ProjectSubsidyWork();
        $work->work_name = $workNames[$i];
        $work->price = 100*1000000;
        $work->self_finance_sum = 50*1000000;
        $work->subsidy_sum = 30*1000000;
        $work->credit_sum = 20*1000000;
        $works[] = $work;
    }
}
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

/* @var $subsidyProtocols SubsidyProtocol[]*/
$subsidyProtocols = SubsidyProtocol::find()->orderBy(['id' => SORT_DESC])->limit(30)->all();
$protocolItems = ArrayHelper::map($subsidyProtocols, 'id', function(SubsidyProtocol $val){return $val->protocol_number .' (' . $val->getProtocolDateSimple() . ')'; });


//print_r($project); exit;
$this->title = $contragent->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appeals'), 'url' => ['appeals']];
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
                        <a href="<?=Url::to(['agency/appeal-view', 'id' => $appeal->id])?>" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
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
                    <span class="font-weight-bolder font-size-h5"><?=$project->getProjectAllPriceAsMillionSum()?> млн сўм</span>
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
                    <span class="font-weight-bolder font-size-h5"><?=$project->counter_ga?> га</span>
                </div>
            </div>
            <!--end: Item-->
            <!--begin: Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1 hide">
                <span class="mr-4">
                    <i class="flaticon-confetti icon-2x text-muted font-weight-bold"></i>
                </span>
                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm" data-container="body" data-toggle="popover" data-placement="top" data-content="Яратиладиган саноатбоп узум плантациялари жойлашган жой">Жойлашган жой</span>
                    <span class="font-weight-bolder font-size-h5"><?=$project->plant_address?> </span>
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
                    <span class="font-weight-bolder font-size-h5"><?=$project->job_count?> киши</span>
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
                    <span class="font-weight-bolder font-size-h5"><?=$project->end_date?></span>
                </div>
            </div>
            <!--end: Item-->

            <!--begin: Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                <a href="<?=Url::to(['agency/appeal-view-doc', 'id' => $appeal->id])?>" class="mr-4">
                    <i class="flaticon2-print icon-2x text-muted font-weight-bold"></i>
                </a>
                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm" data-container="body" data-toggle="popover" data-placement="top" data-content=" ">&nbsp;</span>
                    <span class="font-weight-bolder font-size-h5">&nbsp;</span>
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
        <div class="card-toolbar hide">
            <a href="#" class="btn btn-success font-weight-bolder font-size-sm">
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
                Add New Member
            </a>
        </div>
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
                <?php for($i=0; $i<count($works); $i++): $work = $works[$i] ?>

                    <tr>
                        <td style="width: 60px; " class="text-dark-75 pl-5">
                            <span class="text-dark-75"><?=($i+1)?></span>
                        </td>
                        <td class="pl-0 py-7">
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg pr-5"><?=$work->work_name?></span>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$work->getPriceAsMillionSum()?></span>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$work->getSelfFinanceSumAsMillionSum()?></span>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$work->getSubsidySumAsMillionSum()?></span>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$work->getCreditSumAsMillionSum()?></span>
                        </td>
                    </tr>
                <?php endfor; ?>

                <tr>
                    <td style="width: 60px; " class="pl-5">
                        <span class="text-dark-75">&nbsp;</span>
                    </td>
                    <td class="pl-0 py-7">
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$sumWork->work_name?></span>
                    </td>
                    <td>
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$sumWork->getPriceAsMillionSum()?></span>
                    </td>
                    <td>
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$sumWork->getSelfFinanceSumAsMillionSum()?></span>
                    </td>
                    <td>
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$sumWork->getSubsidySumAsMillionSum()?></span>
                    </td>
                    <td>
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$sumWork->getCreditSumAsMillionSum()?></span>
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
        <?php foreach($appeal->appealAttachments as $appatt) : $attach = $appatt->attachment; ?>
            <!--begin::Item-->
            <div class="d-flex align-items-center mb-2">
                <!--begin::Symbol-->
                <div class="symbol symbol-40 symbol-light-primary mr-5">
                    <span class="flaticon-clipboard symbol-label" style="font-size:35px;"></span>
                </div>
                <!--end::Symbol-->
                <!--begin::Text-->
                <div class="d-flex flex-column font-weight-bold">
                    <a href="<?=Url::to(['/'.$attach->path])?>" target="_blank" class="text-dark text-hover-primary mb-1 font-size-lg"><?=AppealAttachment::getAttachDocName($appatt->type)?></a>
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



<!--begin::Card-->
<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label"><?=Yii::t('app-msg', 'Appeal status change history')?></h3>
        </div>
    </div>
    <div class="card-body">
        <!--begin::Example-->
        <div class="example example-basic">
            <div class="example-preview">
                <!--begin::Timeline-->
                <div class="timeline timeline-2">
                    <div class="timeline-bar"></div>
                    <?php foreach($statusChanges as $stc):?>
                        <div class="timeline-item">
                            <div class="timeline-badge <?=$bg_badges[$stc->status]?>"></div>
                            <div class="timeline-content d-flex align-items-center justify-content-between">
                                <span class="mr-3">
                                    <?=$stc->comment?>
                                    <span class="label label-inline ml-3 font-weight-bolder <?=$status_colors[$stc->status]?>"><?=$appealStatuses[$stc->status]?></span>

                                    <div class="symbol symbol-20 symbol-light-info ml-2">
                                        <span class="flaticon-user symbol-label" style="font-size:15px;"  data-container="body" data-toggle="popover" data-placement="top" data-content="<?=$stc->statusBy ? $stc->statusBy->fullname : ""?>"></span>
                                    </div>
                                </span>
                                <span class="text-muted text-right"><?=simpleDateTime($stc->action_time)?></span>
                            </div>

                        </div>
                    <?php endforeach; ?>

                    <?php if(count($statusChanges) == 0):?>
                        <div class="timeline-item">
                            <div class="symbol symbol-40 symbol-light-warning mr-5">
                                <span class="flaticon-questions-circular-button symbol-label" style="font-size:35px;"></span>
                            </div>
                            <div class="timeline-content d-flex align-items-center justify-content-between">
                                <i class="mr-3">
                                    Ariza holati hali o'zgarmagan.
                                </i>
                                <span class="text-muted text-right"> </span>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
                <!--end::Timeline-->
            </div>
        </div>
        <!--end::Example-->
    </div>
</div>
<!--end::Card-->



<!-- Button trigger modal-->
<?php if($appeal->appeal_status == AppealStatus::APPEAL_SENT_TO_AGENCY): ?>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#acceptAppealModal">
        <?=Yii::t('app-msg', 'Accept appeal')?>
    </button>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#returnAppealModal">
        <?=Yii::t('app-msg', 'Return appeal')?>
    </button>
<?php endif; ?>
<?php if($appeal->appeal_status == AppealStatus::APPEAL_AGENCY_ACCEPTED): ?>
    <button type="button" class="btn btn-primary hide" data-toggle="modal" data-target="#referToCouncilModal">
        <?=Yii::t('app-msg', 'Refer to council')?>
    </button>
<?php endif; ?>
<?php if($appeal->appeal_status == AppealStatus::APPEAL_REFERRED_TO_COUNCIL): ?>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#councilAcceptModal">
        <?=Yii::t('app-msg', 'Council accept')?>
    </button>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#councilRefuseModal">
        <?=Yii::t('app-msg', 'Council refuse')?>
    </button>
<?php endif; ?>
<?php if($appeal->appeal_status == AppealStatus::APPEAL_COUNCIL_ACCEPTED): ?>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#subsidyAllocatedtModal">
        <?=Yii::t('app-msg', 'Subsidy allocated')?>
    </button>
<?php endif; ?>





<div style="font-size:12px; font-style: italic; margin-top: 30px;">
    <span style="">
        <?=Yii::t('app-msg', 'Last updated')?>
    </span>
    <span class="flaticon-time ml-3 mr-1" style="font-size:16px;"></span>
    <?=simpleDateTime($appeal->updated_at)?>

    <span class="flaticon-user ml-3 mr-1" style="font-size:16px;"></span>
    <?=$appeal->updatedBy ? $appeal->updatedBy->fullname : ""?>
</div>


<!-- Modal-->
<div class="modal fade" id="acceptAppealModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1" style="color:#55dd55"><?=Yii::t('app-msg', 'Accept appeal')?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <input id="appeal-accept-id" type="hidden" value="<?=$appeal->id?>" />
                <input id="appeal-accept-status" type="hidden" value="<?=AppealStatus::APPEAL_AGENCY_ACCEPTED?>" />
                <textarea id="appeal-accept-comment"><?=Yii::t('app-msg', 'Appeal is accepted.')?></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal"><?=Yii::t('app', 'Close')?></button>
                <button type="button" class="btn btn-primary font-weight-bold" onclick="acceptAppeal(event);"><?=Yii::t('app', 'Save')?></button>
            </div>
        </div>
    </div>
</div>

<!-- Modal-->
<div class="modal fade" id="returnAppealModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2" style="color:#dd5555"><?=Yii::t('app-msg', 'Return appeal')?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <input id="appeal-return-id" type="hidden" value="<?=$appeal->id?>" />
                <input id="appeal-return-status" type="hidden" value="<?=AppealStatus::APPEAL_AGENCY_RETURNED?>" />
                <textarea id="appeal-return-comment"><?=Yii::t('app-msg', 'Appeal is returned.')?></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal"><?=Yii::t('app', 'Close')?></button>
                <button type="button" class="btn btn-primary font-weight-bold" onclick="returnAppeal(event);"><?=Yii::t('app', 'Save')?></button>
            </div>
        </div>
    </div>
</div>

<!-- Modal-->
<div class="modal fade" id="referToCouncilModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2" style="color:#5555dd"><?=Yii::t('app-msg', 'Refer to council')?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <input id="appeal-refer-to-council-id" type="hidden" value="<?=$appeal->id?>" />
                <input id="appeal-refer-to-council-status" type="hidden" value="<?=AppealStatus::APPEAL_REFERRED_TO_COUNCIL?>" />
                <textarea id="appeal-refer-to-council-comment"><?=Yii::t('app-msg', 'Appeal is referred to council.')?></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal"><?=Yii::t('app', 'Close')?></button>
                <button type="button" class="btn btn-primary font-weight-bold" onclick="referAppealToCouncil(event);"><?=Yii::t('app', 'Save')?></button>
            </div>
        </div>
    </div>
</div>


<style>
    div#acceptAppealModal .modal-body textarea,
    div#returnAppealModal .modal-body textarea,
    div#referToCouncilModal .modal-body textarea {
        width:100%;
        height: 100px;
    }
</style>

<script>
    var AgencyAppealStatusChangeUrl = "<?=Url::to(['agency/appeal-status-change'])?>";
    function getCsrfData() {
        let param = $("head meta[name=csrf-param]").attr("content");
        let value = $("head meta[name=csrf-token]").attr("content");
        let data = {};
        data[param] = value;
        return data;
    }
    function acceptAppeal(e) {
        let data = getCsrfData();
        data['appeal-id'] = $("#appeal-accept-id").val();
        data['status'] = $("#appeal-accept-status").val();
        data['comment'] = $("#appeal-accept-comment").val();
        $.ajax({
            url: AgencyAppealStatusChangeUrl,
            data: data,
            type: 'POST',
            success: function(response) {
                if(response.message) {
                    alert(response.message);
                }
                if(response.refresh == 1) {
                    $("#acceptAppealModal").modal("hide");
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

    function returnAppeal(e) {
        let data = getCsrfData();
        data['appeal-id'] = $("#appeal-return-id").val();
        data['status'] = $("#appeal-return-status").val();
        data['comment'] = $("#appeal-return-comment").val();
        $.ajax({
            url: AgencyAppealStatusChangeUrl,
            data: data,
            type: 'POST',
            success: function(response) {
                if(response.message) {
                    alert(response.message);
                }
                if(response.refresh == 1) {
                    $("#returnAppealModal").modal("hide");
                    document.location = document.location;
                } else if(response.result == 1) {
                    $("#returnAppealModal").modal("hide");
                }
            },
            error: function(error) {
                alert(error);
            }
        });
    }
</script>
