<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use \app\modules\admin\models\Users;
use app\modules\subsidy\models\Appeal;
use app\models\BaseModel;
use \app\modules\manuals\models\MysoliqRegion;
use \app\modules\manuals\models\MysoliqDistrict;
use \app\modules\subsidy\models\ProjectSubsidyNavType;
use app\modules\manuals\models\NavType;
use app\modules\subsidy\models\ProjectSubsidyWork;

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

$region = MysoliqRegion::getRegion($contragent->region_id);
$district = MysoliqDistrict::getDistrict($contragent->district_id, $contragent->region_id);
$subsidy_nav_type = ProjectSubsidyNavType::find()->where(['project_subsidy_id' => $project->id])->all();
//var_dump($subsidy_nav_type); exit;
$this->title = $department->name_uz;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appeals'), 'url' => ['appeals']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$file_data = '<span class="svg-icon svg-icon-primary svg-icon-2x">
    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Done-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <rect x="0" y="0" width="24" height="24" />
            <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
            <path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
        </g>
    </svg>
    <!--end::Svg Icon-->
</span>';
$file_data_no = '<span class="svg-icon svg-icon-primary svg-icon-2x">
    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Error-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <rect x="0" y="0" width="24" height="24" />
            <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
            <path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000" />
        </g>
    </svg>
    <!--end::Svg Icon-->
</span>';


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
?>

<div class="appeal-view">

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
                            <a href="<?=Url::to(['agency/appeal-view-doc', 'id' => $appeal->id])?>" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
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
                    <?=$project->getProjectAllPriceAsMillionSum()?> млн сўм</span>
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
                    <?=$project->counter_ga?> га</span>
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
                        <span class="font-weight-bolder font-size-h5">
                    <?=$project->plant_address?> </span>
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
                    <?=$project->job_count?> киши</span>
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


                <!--begin: Item-->
                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                    <a href="<?=Url::to(['agency/appeal-view', 'id' => $appeal->id])?>" class="mr-4">
                        <i class="flaticon2-list-3 icon-2x text-muted font-weight-bold"></i>
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


    <!--begin::Header-->
    <div class="card-header card-header-tabs-line">
        <div class="card-toolbar">
            <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x" role="tablist">
                <li class="nav-item mr-3">
                    <a class="nav-link active" data-toggle="tab" href="#appeal">
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
                        <span class="nav-text font-weight-bold">Ариза документ</span>
                    </a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link" data-toggle="tab" href="#project-subsidy">
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
                        <span class="nav-text font-weight-bold">Лойиҳа документ</span>
                    </a>
                </li>

                <li class="nav-item mr-3">
                    <a class="nav-link" id="contragent-tab" data-toggle="tab" href="#contragent" role="tab" aria-controls="contragent" aria-selected="true"><?=Yii::t('app', 'Contragent')?></a>
                </li>

            </ul>
        </div>
    </div>
    <!--end::Header-->

    <div class="tab-content mb-5" id="myTabContent">

        <div class="tab-pane show active" id="appeal" role="tabpanel" aria-labelledby="project-subsidy-tab">
            <div class="card-body" style="margin: 0 50px 0 50px;">
                    <div class="subsidy-ariza-fishka">
                        <h1 class="ariza-fishka">
                            Алкоголь ва тамаки бозорини тартибга солиш ҳамда виночиликни ривожлантириш агентлигига
                        </h1>
                    </div>
                    <div class="subsidy-ariza-text-1">
                        <p>
                            <span class="contur-data-abzas"><?php echo explode(' ', $region)[0]; ?></span> вилояти
                            <span class="contur-data"><?php echo explode(' ', $district)[0]; ?></span> тумани
                            <span class="contur-data"><?php echo $contragent->name ?></span> (МЧЖ, фермер хўжалиги)га
                            қарашли <span class="contur-data"><?php echo $project->contur_number ?></span> - сон контур(лар)да жойлашган
                            <span class="contur-data"><?php echo $project->counter_ga ?></span> гектар майдонда <span class="contur-data"><?php echo date('Y') ?></span>
                            йилда барпо этилаётган янги санаотбоп токзорлар учун томчилатиб суғориш технологияларини жорий қилиш, ер остидан сув
                            чиқаришга <span class="contur-data"><?php echo $project->water_pump_count ?></span> дона бурғиланган қудуқ(лар), шунингдек насос станцияси
                            қуриш (ёки дарёлар, каналлар ва бошқа сув ҳавзаларидан сувни тортиш учун насос станциялари ўрнатиш) режалаштирилган.
                        </p>
                    </div>

                    <div class="subsidy-ariza-text-2">
                        <p>
                            <span class="contur-data-abzas"><?php echo explode(' ', $district)[0]; ?></span> туман ер ресурслари ва давлат кадастри бўлимининг маълумотига
                            кўра, мазкур контур(лар)даги <span class="contur-data"><?php echo $project->counter_ga ?></span> гектар майдони <span class="contur-data"><?php echo $project->bonitet_ball ?></span> бонитет баллни ташкил этади.
                        </p>
                    </div>

                    <div class="subsidy-ariza-text-2">
                        <p>
                            <span style="margin-left: 50px;">Юқоридагиларни</span> инобатга олиб, <span class="contur-data"><?php echo $project->counter_ga ?></span> гектар майдонга томчилатиб суғориш тизимини жорий
                            қилиниши ва <span class="contur-data"><?php echo $project->bonitet_ball ?></span> дона бурғиланган қудуқ, шунингдек, насос станцияси қурилиши (ёки дарёлар, каналлар ва бошқа сув ҳавзаларидан сувни тортиш учун насос станциялари ўрнатиш) учун субсидия ажратишингизни сўраймиз.
                        </p>
                    </div>

                    <div class="subsidy-ariza-text-2">
                        <h2 class="subsidy-bank">
                            Манзил ва банк реквизитлари:
                        </h2>
                        <p>
                            <span class="bank-data-number">1.</span> Ариза берувчи: <span class="contur-data"><?php echo $contragent->name ?></span> фермер хўжалиги, (масъулияти чекланган жамияти) <br>
                            <span class="bank-data-number">2.</span> Манзил: <span class="contur-data"><?php echo explode(' ', $region)[0]; ?></span> вилояти, <span class="contur-data"><?php echo explode(' ', $district)[0]; ?></span> тумани, <span class="contur-data"><?php echo $contragent->address ?></span>, телефон рақами <span class="contur-data"><?php echo $contragent->tel ?></span>, <span class="contur-data"><?php echo $contragent->accounter_tel ?></span> <br>
                            <span class="bank-data-number">3.</span> Ариза берувчининг банк реквизитлари: <span class="contur-data"><?php echo $contragent->bank ?></span> банки <span class="contur-data"><?php echo explode(' ', $region)[0]; ?></span> вилоят бошқармаси <span class="contur-data"><?php echo explode(' ', $district)[0]; ?></span> тумани филиали: х/р:____________________, МФО: ________, ИНН: <span class="contur-data"><?php echo $contragent->accounter_inn ?></span><br>

                        </p>
                    </div>
                    <br>
                    <div class="subsidy-ariza-text-2">
                        <h2 class="subsidy-hujjatlar">
                            Қуйидаги ҳужжатлар илова қилинади:
                        </h2>
                        <p>
                            <?php $i = 0;  foreach($appeal->appealAttachments as $appatt) : $i++; $attach = $appatt->attachment; ?>
                                <span class="hujjat-data-number"><?=$i?>.</span> <?=\app\modules\subsidy\models\AppealAttachment::getAttachDocName($appatt->type)?>
                                <?=$file_data?> <br>
                            <?php endforeach; ?>
                        </p>
                    </div>

                    <div class="subsidy-ariza-rahbar">
                        <h2 class="subsidy-tash-rah">Ташкилот раҳбари</h2>
                        <h2 class="subsidy-tash-rah-fio">Ф.И.Ш.</h2>
                    </div>
                    <!--begin::Actions-->
                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                        <div class="mr-2">
                        </div>
                        <div>
                            <a href="#" onclick="event.preventDefault();" class="btn btn-success font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-submit" type="submit">
                                Чоп етиш
                            </a>
                        </div>
                    </div>
                    <!--end::Actions-->
            </div>
        </div>

        <div class="tab-pane" id="project-subsidy" role="tabpanel">
            <div class="card-body" style="margin: 0 50px 0 50px;">
                    <div class="loyiha-header">
                        <h3 class="loyiha-header-title">
                            Янги саноатбоп узум плантацияларини яратиш бўйича лойиҳа тўғрисида
                        </h3>
                        <h2 class="loyiha-header-title">
                            МАЪЛУМОТ
                        </h2>
                    </div>

                    <div class="subsidy-loyiha-text-1">
                        <p class="hujjat-data-number">
                            <span>1.</span> Лойиҳа ташаббускори: <span class="contur-data"><?php echo $contragent->name ?></span> <br>
                            <span>2.</span> Яратиладиган саноатбоп узум плантацияларининг умумий майдони: <span class="contur-data"><?php echo $project->counter_ga ?></span> га. <br>
                            <span>3.</span> Яратиладиган саноатбоп узум плантациялари жойлашган жой: <span class="contur-data"><?php echo $contragent->address ?></span>.<br>
                            <span>4.</span> Саноатбоп узум навини ўтказиш режаси:
                            (<span class="contur-data"><?php echo $project->getPlantSchemaOne($project->plant_schema_id) ?></span> ,
                            <span class="contur-data"><?php echo $project->plant_all_count ?></span> дона кўчат,
                            <?php foreach ($subsidy_nav_type as $value) : ?>
                                <span class="contur-data"> <?php echo NavType::findOne($value->nav_type_id)->$prop ?> </span> - <span class="contur-data"><?php echo $value->area_ga ?></span> га,
                            <?php endforeach ?>
                            )
                            <br>
                            <span>5.</span> Лойиҳани амалга ошириш муддати: <span class="contur-data"><?php echo $project->end_date ?></span> . <br>
                            <span>6.</span> Яратиладиган иш жойи: <span class="contur-data"><?php echo $project->job_count ?></span> киши. <br>
                            <span>7.</span> Лойиҳанинг умумий қиймати — <span class="contur-data"><?php echo $project->getProjectAllPriceAsMillionSum()  ?></span> млн сўм, ундан:<br>
                        </p>
                    </div>

                    <div class="subsidy-loyiha-table">
                        <!--begin::Body-->
                        <div class="card-body pt-0 pb-3">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-head-custom table-head-bg table-vertical-center">
                                    <thead>
                                    <tr class="text-uppercaser">
                                        <th style="width: 60px" class="pl-5">
                                            <span class="text-dark-75 table-text-center">Т/р</span>
                                        </th>
                                        <th style="width: 350px" class="text-dark-75 pl-7">
                                            <span class="text-dark-75 table-text-center">Амалга ошириладиган ишлар</span>
                                        </th>
                                        <th style="width: 150px">
                                            <span class="text-dark-75 table-text-center">Лойиҳанинг умумий қиймати, млн сўм, ундан:</span>
                                        </th>
                                        <th style="width: 150px">
                                            <span class="text-dark-75 table-text-center">Лойиҳа ташаббускор-ларининг маблағлари</span>
                                        </th>
                                        <th style="width: 150px">
                                            <span class="text-dark-75 table-text-center">Виночиликни ривожлантириш жамғармаси субсидиялари</span>
                                        </th>
                                        <th style="width: 150px">
                                            <span class="text-dark-75 table-text-center">Тижорат банклари кредитлари, жумладан, Жамғарма ресурслари ҳисобига</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php for($i=0; $i<count($works); $i++): $work = $works[$i] ?>
                                        <tr>
                                            <td style="width: 60px; " class="pl-5">
                                                <span class="text-dark-75"><?=($i+1)?></span>
                                            </td>
                                            <td class="pl-0 py-7">
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                    <?=$work->work_name?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                    <?=$work->getPriceAsMillionSum()?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                    <?=$work->getSelfFinanceSumAsMillionSum()?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                    <?=$work->getSubsidySumAsMillionSum()?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                    <?=$work->getCreditSumAsMillionSum()?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endfor; ?>

                                    <tr>
                                        <td style="width: 60px; " class="pl-5">
                                            <span class="text-dark-75">&nbsp;</span>
                                        </td>
                                        <td class="pl-0 py-7">
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg" style="text-align: center;">
                                                <?=$sumWork->work_name?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                <?=$sumWork->getPriceAsMillionSum()?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                <?=$sumWork->getSelfFinanceSumAsMillionSum()?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                <?=$sumWork->getSubsidySumAsMillionSum()?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                <?=$sumWork->getCreditSumAsMillionSum()?>
                                            </span>
                                        </td>
                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Body-->
                    </div>

                    <div class="subsidy-loyiha-footer-text">
                        <p class="loyiha-footer-text">
                            Келтирилган маълумотлар ишончли бўлиб биз янги саноатбоп узум плантацияларини яратиш бўйича лойиҳа тўлиқ ҳажмда ўз вақтида ва сифатли амалга оширилишига кафолат берамиз.
                        </p>
                    </div>

                    <div class="subsidy-loyiha-rahbar">
                        <h2 class="tash-bosh">
                            Ташкилот бошлиғи
                        </h2>
                        <span class="tag-fio">
                                        <?php echo $contragent->accounter ?>
                                    </span>

                        <span class="tag-imzo">
                                        _________________________
                                    </span>

                    </div>

                    <div class="subsidy-footer-izox">
                        <p class="footer-izox">
                            Изоҳ: Лойиҳалаштиришнинг аниқ манбалари кўрсатилмаган лойиҳалар кўриб чиқилмайди.
                        </p>
                    </div>
                    <!--begin::Actions-->
                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                        <div class="mr-2">
                        </div>
                        <div>
                            <a href="#" onclick="event.preventDefault();" class="btn btn-success font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-submit" type="submit">
                                Чоп етиш
                            </a>
                        </div>
                    </div>
                    <!--end::Actions-->
            </div>
        </div>

        <div class="tab-pane " id="contragent" role="tabpanel" aria-labelledby="contragent-tab">
            <?= DetailView::widget([
                'model' => $contragent,
                'options' => [
                    'style' =>[
                        'border-collapse' =>'collapse',
                        'height' => '25px',
                        'line-height' => '25px',
                        'box-shadow' => '0 0 5px grey',
                        'border-radius' => '5px',
                        'overflow' => 'auto'
                    ],
                    'class' =>'table table-bordered'
                ],
                'attributes' => [
                    [
                        'attribute' => 'id',
                        'value' => $contragent->id,
                    ],
//                    'name',
//                    'short_name',
//                    'inn',
//                    'vatcode',
//                    'oked',

                    'name',
                    'short_name',
                    'add_info',
                    'address',
                    'director',
                    'tel',
//                    'status',
//                    'created_at',
//                    'created_by',
//                    'updated_at',
//                    'updated_by',
                    'distance',
                    'inn',
                    'vatcode',
                    'contact_info',
                    'oked',
                    'accounter',
//                    'department_id',
                    'accounter_inn',
                    'accounter_tel',
                    'director_inn',
//                    'region_id',
//                    'district_id',
                    'bank',
                    'bank_code',
                    'bank_account_number',
                    'fund',
                    'reg_date',
                    'reg_num',
                    'nc1Code',
                    'nc1Name',
                    'nc2Name',
                    'nc2Code',
                    'nc3Code',
                    'nc3Name',
                    'nc4Name',
                    'nc4Code',
                    'nc5Code',
                    'nc5Name',
                    'nc6Name',
                    'nc6Code',
                    'ns1Code',
                    'ns1Name',
                    'ns3Code',
                    'ns3Name',
                    'ns4Code',
                    'ns4Name',
                    'ns13Code',
                    'ns13Name',
                    'na1Code',
                    'na1Name',
                    'stateCode',
                    'stateName',



//                    'appeal_type',
//                    'status',
                    [
                        'attribute' => 'status',
                        'value' => BaseModel::getStatusList($appeal->status),
                    ],
                ],
            ]) ?>
        </div>

    </div>

</div>


<style>
    .subsidy-name {
        font-size: 22px !important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: 600 !important;
        color: black !important;
        text-align: center;
    }

    .subsidy-table-header {
        font-size: 16px !important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: 600 !important;
        color: black !important;
        text-align: center;
    }

    .subsidy-table-textarea {
        height: 80px;
        width: 100%;
    }

    .subsidy-header {
        display: flex;
        justify-content: center;
        font-size: 20px !important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: 600 !important;
        color: black !important;
        text-align: center;
    }

    .subsidy-ariza-fishka {
        display: inline-block;
        text-align: center;
        margin-left: 71%;
    }

    .ariza-fishka {
        font-size: 16px !important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: 600 !important;
        color: black !important;
    }

    .subsidy-ariza-text-1 {
        font-size: 14px !important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        margin-top: 50px;
    }

    .subsidy-ariza-text-2 {
        font-size: 14px !important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        margin-top: 5px;
    }

    .contur-data-abzas {
        color: #464E5F !important;
        font-weight: 600 !important;
        margin-left: 50px;
        margin-right: 10px;
        text-decoration: underline;
    }

    .contur-data {
        color: #464E5F !important;
        font-weight: 600 !important;
        margin-left: 10px;
        margin-right: 10px;
        text-decoration: underline;
    }

    .subsidy-bank {
        font-size: 16px !important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: 600 !important;
        color: black !important;
        margin-left: 50px;
    }

    .subsidy-hujjatlar {
        font-size: 16px !important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: 400 !important;
        color: black !important;
        margin-left: 50px;
    }

    .bank-data-number {
        font-size: 14px !important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: 600 !important;
        color: black !important;
        margin-left: 40px;
        margin-right: 5px;
    }

    .hujjat-data-number {
        font-size: 14px !important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: 400 !important;
        color: black !important;
        margin-left: 40px;
        margin-right: 5px;
    }

    .subsidy-ariza-rahbar {
        display: flex;
        margin-top: 50px;
    }

    .subsidy-tash-rah {
        font-size: 16px !important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: 600 !important;
        color: black !important;
        margin-left: 60px;
    }

    .subsidy-tash-rah-fio {
        font-size: 16px !important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: 600 !important;
        color: black !important;
        margin-left: 500px;
    }

    /* loyiha */
    .loyiha-header-title {
        text-align: center;
        font-size: 16px !important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: 600 !important;
        color: black !important;
    }

    .subsidy-loyiha-text-1 {
        font-size: 14px !important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        margin-top: 40px;
    }

    .loyiha-sxema-text {
        margin-left: 60px;
    }

    .table-text-center {
        text-align: center;
    }

    .subsidy-loyiha-table {
        margin-top: 50px;
    }

    .subsidy-loyiha-footer-text {
        margin-top: 40px;
    }

    .subsidy-loyiha-footer-text {
        text-align: center;
        font-size: 16px !important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        color: black !important;
    }

    .subsidy-footer-izox {
        margin-top: 40px;
    }

    .footer-izox {
        font-size: 16px !important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        color: black !important;
    }

    .subsidy-loyiha-rahbar {
        display: flex;
        margin-top: 50px;
    }

    .tash-bosh {
        font-size: 16px !important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: 600 !important;
        color: black !important;
    }

    .tag-fio {
        margin-left: 10%;
        font-size: 16px !important;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        color: #464E5F !important;
        font-weight: 600 !important;
        text-decoration: underline;
    }

    .tag-imzo {
        margin-left: 10%;
    }
</style>

<style>
    div#myTabContent .tab-pane {
        background: white;
        margin-top:20px;
        padding-top:20px;
    }
</style>

<?php
$js = <<<JS
    $('.modal-title').html('{$this->title}');
JS;
$this->registerJS($js);
?>

