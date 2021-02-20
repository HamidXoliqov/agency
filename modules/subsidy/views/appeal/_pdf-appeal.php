<?php

use app\modules\subsidy\models\Appeal;
use yii\helpers\Url;

$this->registerCssFile("/css/main.css");

$this->title = Yii::t('app','Appeal document');
?>


<div class="card-body" style="margin: 0 50px 0 50px;">
    <!-- <form class="form"> -->
        <div class="subsidy-ariza-fishka">
            <h1 class="ariza-fishka">
                Алкоголь ва тамаки бозорини тартибга солиш ҳамда виночиликни ривожлантириш агентлигига
            </h1>
        </div>
        <div class="subsidy-ariza-text-1">
            <p>
                <span class="contur-data-abzas"><?php echo explode(' ', $region)[0]; ?></span> вилояти
                <span class="contur-data"><?php echo explode(' ', $district)[0]; ?></span> тумани
                <span class="contur-data"><?php echo $contr_agent->name ?></span> (МЧЖ, фермер хўжалиги)га
                қарашли <span class="contur-data"><?php echo $project_subsidy->contur_number ?></span> - сон контур(лар)да жойлашган
                <span class="contur-data"><?php echo $project_subsidy->counter_ga ?></span> гектар майдонда <span class="contur-data"><?php echo date('Y') ?></span>
                йилда барпо этилаётган янги санаотбоп токзорлар учун томчилатиб суғориш технологияларини жорий қилиш, ер остидан сув
                чиқаришга <span class="contur-data"><?php echo $project_subsidy->water_pump_count ?></span> дона бурғиланган қудуқ(лар), шунингдек насос станцияси
                қуриш (ёки дарёлар, каналлар ва бошқа сув ҳавзаларидан сувни тортиш учун насос станциялари ўрнатиш) режалаштирилган.
            </p>
        </div>

        <div class="subsidy-ariza-text-2">
            <p>
                <span class="contur-data-abzas"><?php echo explode(' ', $district)[0]; ?></span> туман ер ресурслари ва давлат кадастри бўлимининг маълумотига
                кўра, мазкур контур(лар)даги <span class="contur-data"><?php echo $project_subsidy->counter_ga ?></span> гектар майдони <span class="contur-data"><?php echo $project_subsidy->bonitet_ball ?></span> бонитет баллни ташкил этади.
            </p>
        </div>

        <div class="subsidy-ariza-text-2">
            <p>
                <span style="margin-left: 50px;">Юқоридагиларни</span> инобатга олиб, <span class="contur-data"><?php echo $project_subsidy->counter_ga ?></span> гектар майдонга томчилатиб суғориш тизимини жорий
                қилиниши ва <span class="contur-data"><?php echo $project_subsidy->bonitet_ball ?></span> дона бурғиланган қудуқ, шунингдек, насос станцияси қурилиши (ёки дарёлар, каналлар ва бошқа сув ҳавзаларидан сувни тортиш учун насос станциялари ўрнатиш) учун субсидия ажратишингизни сўраймиз.
            </p>
        </div>

        <div class="subsidy-ariza-text-2">
            <h2 class="subsidy-bank">
                Манзил ва банк реквизитлари:
            </h2>
            <p>
                <span class="bank-data-number">1.</span> Ариза берувчи: <span class="contur-data"><?php echo $contr_agent->name ?></span> фермер хўжалиги, (масъулияти чекланган жамияти) <br>
                <span class="bank-data-number">2.</span> Манзил: <span class="contur-data"><?php echo explode(' ', $region)[0]; ?></span> вилояти, <span class="contur-data"><?php echo explode(' ', $district)[0]; ?></span> тумани, <span class="contur-data"><?php echo $contr_agent->address ?></span>, телефон рақами <span class="contur-data"><?php echo $contr_agent->tel ?></span>, <span class="contur-data"><?php echo $contr_agent->accounter_tel ?></span> <br>
                <span class="bank-data-number">3.</span> Ариза берувчининг банк реквизитлари: <span class="contur-data"><?php echo $contr_agent->bank ?></span> банки <span class="contur-data"><?php echo explode(' ', $region)[0]; ?></span> вилоят бошқармаси <span class="contur-data"><?php echo explode(' ', $district)[0]; ?></span> тумани филиали: х/р:____________________, МФО: ________, ИНН: <span class="contur-data"><?php echo $contr_agent->accounter_inn ?></span><br>

            </p>
        </div>
        <br>
        <div class="subsidy-ariza-text-2">
            <h2 class="subsidy-hujjatlar">
                Қуйидаги ҳужжатлар илова қилинади:
            </h2>
            <p>
                <?php foreach ($appeal_attachment as $key => $value) : ?>
                    <?php switch ($key + 1) {
                        case '1':
                            echo ' <span class="hujjat-data-number">1.</span>  Лойиҳа тўғрисида маълумот:';
                            break;
                        case '2':
                            echo '<span class="hujjat-data-number">2.</span>  Ер ажратиш тўғрисида туман ҳокимининг қарори ва харитаси нусхаси:';
                            break;
                        case '3':
                            echo '<span class="hujjat-data-number">3.</span>  Ер участкасига бўлган ижара шартномаси нусхаси:';
                            break;
                        case '4':
                            echo '<span class="hujjat-data-number">4.</span>  Ер балл бонитет бўйича кадастр маълумотномаси нусхаси:';
                            break;
                        default:
                            # code...
                            break;
                    } ?>
                    <?php if (!empty($value->attachment_id)) {
                        echo '<span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Done-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                        <path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span> <br>';
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
                            </span> <br>';
                    } ?>
                <?php endforeach ?>

            </p>
        </div>
        <div class="row">
            <div class="col-lg-10 col-xl-10">
                <div class="subsidy-ariza-rahbar">
                    <h2 class="subsidy-tash-rah">Ташкилот раҳбари:</h2>
                    <h4><?= $contr_agent->director ?></h4>
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

        <!--begin::Actions-->
        <div class="d-flex justify-content-between border-top mt-5 pt-10">
            <div class="mr-2">
            </div>
            <div>
                <input id="appeal-send-id" type="hidden" value="<?=$appeal->id?>" />
                <a href="<?=Url::to(['/subsidy/appeal/mpdf-appeal?id=']).$appeal->id?>" class="btn btn-success font-weight-bold text-uppercase px-9 py-4" target="_blank" id="appeal_click">
                    Чоп етиш
                </a>
            </div>
        </div>
        <!--end::Actions-->
    <!-- </form> -->
</div>

<?php
$this->registerJs("
    $('#appeal_click').click(function(e) {  
        $('.svg-icon').css('display', 'none');
    });
");
?>