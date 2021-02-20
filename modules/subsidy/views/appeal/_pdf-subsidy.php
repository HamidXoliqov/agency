<?php

use app\modules\manuals\models\NavType;
use app\modules\subsidy\models\Appeal;
use app\modules\subsidy\models\ProjectSubsidyWork;
use yii\helpers\Url;

$this->registerCssFile("/css/main.css");

$lang_name = 'name_' . Yii::$app->language;
$sumWork = new ProjectSubsidyWork();
$sumWork->setAttributes([
    'work_name' => 'ЖАМИ:',
    'price' => 0,
    'self_finance_sum' => 0,
    'subsidy_sum' => 0,
    'credit_sum' => 0,
]);
foreach ($project_subsidy_work as $w) {
    $sumWork->price += $w->price;
    $sumWork->self_finance_sum += $w->self_finance_sum;
    $sumWork->subsidy_sum += $w->subsidy_sum;
    $sumWork->credit_sum += $w->credit_sum;
}

?>
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
            <span>1.</span> Лойиҳа ташаббускори: <span class="contur-data"><?php echo $contr_agent->name ?></span> <br>
            <span>2.</span> Яратиладиган саноатбоп узум плантацияларининг умумий майдони: <span class="contur-data"><?php echo $project_subsidy->counter_ga ?></span> га. <br>
            <span>3.</span> Яратиладиган саноатбоп узум плантациялари жойлашган жой: <span class="contur-data"><?php echo $contr_agent->address ?></span>.<br>
            <span>4.</span> Саноатбоп узум навини ўтказиш режаси:
            (<span class="contur-data"><?php echo $project_subsidy->getPlantSchemaOne($project_subsidy->plant_schema_id) ?></span> ,
            <span class="contur-data"><?php echo $project_subsidy->plant_all_count ?></span> дона кўчат,
            <?php foreach ($subsidy_nav_type as $value) : ?>
                <span class="contur-data"> <?php echo NavType::findOne($value->nav_type_id)->$lang_name ?> </span> - <span class="contur-data"><?php echo $value->area_ga ?></span> га,
            <?php endforeach ?>
            )
            <br>
            <span>5.</span> Лойиҳани амалга ошириш муддати: <span class="contur-data"><?php echo $project_subsidy->end_date ?></span> . <br>
            <span>6.</span> Яратиладиган иш жойи: <span class="contur-data"><?php echo $project_subsidy->job_count ?></span> киши. <br>
            <span>7.</span> Лойиҳанинг умумий қиймати — <span class="contur-data"><?php echo number_format($project_subsidy->project_all_price, 2, '.', ' ')  ?></span> млн сўм, ундан:<br>
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
                        <?php foreach ($project_subsidy_work as $key => $value) : ?>
                            <tr>
                                <td style="width: 60px; " class="text-dark-75 pl-5">
                                    <span class="text-dark-75"><?= ($key + 1) ?></span>
                                </td>
                                <td class="pl-0 py-7">
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg pr-5"><?= $value->work_name ?></span>
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?= number_format($value->price, 2, '.', ' ') ?></span>
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?= number_format($value->self_finance_sum, 2, '.', ' ') ?></span>
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?= number_format($value->subsidy_sum, 2, '.', ' ') ?></span>
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?= number_format($value->credit_sum, 2, '.', ' ') ?></span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td style="width: 60px; " class="pl-5">
                                <span class="text-dark-75">&nbsp;</span>
                            </td>
                            <td class="pl-0 py-7">
                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?= $sumWork->work_name ?></span>
                            </td>
                            <td>
                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?= number_format($sumWork->price, 2, '.', ' ') ?></span>
                            </td>
                            <td>
                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?= number_format($sumWork->self_finance_sum, 2, '.', ' ') ?></span>
                            </td>
                            <td>
                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?= number_format($sumWork->credit_sum, 2, '.', ' ') ?></span>
                            </td>
                            <td>
                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?= number_format($sumWork->credit_sum, 2, '.', ' ') ?></span>
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

    <div class="row">
        <div class="col-lg-10 col-xl-10">
            <div class="subsidy-loyiha-rahbar">
                <h2 class="tash-bosh">
                    Ташкилот бошлиғи
                </h2>
                <span class="tag-fio">
                    <?php echo $contr_agent->accounter ?>
                </span>
            </div>
        </div>
        <div class="col-lg-2 col-xl-2">
            <?php if (!empty($appeal->pkcs7)) : ?>
                <div class="qr-code float-right">
                    <?= Appeal::getQrCodeGenerator($appeal->pkcs7) ?>
                </div>
            <?php endif ?>
        </div>
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
            <a href="<?= Url::to(['/subsidy/appeal/mpdf-subsidy?id=']) . $appeal->id ?>" class="btn btn-success font-weight-bold text-uppercase px-9 py-4" target="_blank">
                Чоп етиш
            </a>
        </div>
    </div>
    <!--end::Actions-->
</div>