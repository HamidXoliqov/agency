<?php

use yii\helpers\Html;
use \yii\helpers\Url;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\subsidy\models\ProjectSubsidySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Project Subsidy');
$this->params['breadcrumbs'][] = $this->title;

?>
<style>
    .list-group-item {
        display: flex;
        border: none;
        font-size: 14px;
        font-family: Poppins, Helvetica, "sans-serif";
    }

    .subsidy_ga {
        width: 100px;
        margin-left: 10px;
        margin-right: 10px;
    }

    .subsidy_data {
        margin-left: 10px;
        margin-right: 10px;
        color: #002a80;
    }

    .subsidy_date {
        margin-left: 10px;
        color: #333333;
    }

    .form-select {
        margin-left: 10px;
        margin-right: 10px;
    }

    table, th, td {
        border: 1px solid black;
    }

    .subsidy_work_input {
        width: 100%;
    }
    .subsidy_footer_text{
        font-size: 14px;
        font-family: Poppins, Helvetica, "sans-serif";
        text-align: center;
    }
    .subsidy_fio{
        margin-left: 100px;
    }
    .subsidy_fio_name{
        margin-left: 350px;
    }
    .subsidy_imzo{
        margin-left: 180px;
    }
    .subsidy_imzo_name{
        margin-left: 450px;
    }
    .save{
        width: 100%;
    }
</style>

<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <div class="card-title"><?= Html::encode($this->title) ?></div>
    </div>
    <div class="card-body">
        <div class="subsidy-header">
            <h2 align="center">
                <b>
                    Янги саноатбоп узум плантацияларини яратиш бўйича лойиҳа тўғрисида
                </b>
            </h2>
            <h1 align="center">
                <b>
                    МАЪЛУМОТ
                </b>
            </h1>
            <?php $form = ActiveForm::begin([
                'action' => ['project-subsidy/subsidy-update?id='.$subsidy->id],
                'method' => 'post',
            ]); ?>

                <ul class="list-group">
                    <li class="list-group-item">
                        1. Лойиҳа ташаббускори: <p class="subsidy_data"><?php echo $contragent->name ?></p>
                    </li>
                    <li class="list-group-item">
                        2. Яратиладиган саноатбоп узум плантацияларининг умумий майдони:
                        <input class="subsidy_ga" type="text" name="ProjectSubsidy[counter_ga]" required> га.
                    </li>
                    <li class="list-group-item">
                        3. Яратиладиган саноатбоп узум плантациялари жойлашган жойи: <p
                                class="subsidy_data"><?php echo $contragent->address ?></p>
                    </li>
                    <li class="list-group-item">
                        4. Саноатбоп узум навини ўтказиш режаси:
                        <select class="form-select" aria-label="Default select example" name="ProjectSubsidy[plant_schema_id]">
                            <option selected>Select schema</option>
                            <option value="1">3x2</option>
                            <option value="2">6x5</option>
                            <option value="3">4x8</option>
                        </select>
                        <input class="subsidy_ga" type="text" name="ProjectSubsidy[plant_all_area_ga]" placeholder="Умумий кучат сони"
                               required>
                        <select class="form-select" aria-label="Default select example" name="ProjectSubsidy[plant_schema]">
                            <option selected>Select nav type</option>
                            <option value="1">Баянғ-Ширей</option>
                            <option value="2">6x5</option>
                            <option value="3">4x8</option>
                        </select>га.

                    </li>
                    <li class="list-group-item">
                        5. Лойиҳани амалга ошириш муддати: <input class="subsidy_date" type="text" name="ProjectSubsidy[end_date]"
                                                                  placeholder="масалан, 2020 йил кузи" required>
                    </li>
                    <li class="list-group-item">
                        6. Яратиладиган иш жойи: <input class="subsidy_data" type="text" name="ProjectSubsidy[job_count]"
                                                        placeholder="иш уринлари сони" required> киши.
                    </li>
                    <li class="list-group-item">
                        7. Лойиҳанинг умумий қиймати -
                        <!--                    <select class="form-select" aria-label="Default select example" name="project_all_price_currency_id">-->
                        <!--                        <option selected>Select currency</option>-->
                        <!--                        <option value="1">USD</option>-->
                        <!--                        <option value="2">EUR</option>-->
                        <!--                        <option value="3">CUM</option>-->
                        <!--                    </select>-->
                        <input class="subsidy_data" type="text" name="ProjectSubsidy[project_all_price]" required>
                        млн сўмб ундан.
                    </li>
                </ul>
                <br> <br>
                <table>
                    <tr>
                        <th rowspan="2">Т/р</th>
                        <th rowspan="2">Амалга ошириладиган ишлар</th>
                        <th rowspan="2" width="10%">Лойиҳанинг умумий қиймати, млн сўм, ундан:</th>
                        <th colspan="3">Молиялаштириш манбалари млн сўм</th>
                    </tr>
                    <tr>
                        <td width="20%">Лойиҳа ташаббускорларининг маблағлари</td>
                        <td width="20%">Виночиликни ривожлантириш жамғармаси субсидиялари</td>
                        <td width="20%">Тижорат банклари кредитлари, жумладан, Жамғарма ресурслари ҳисобига</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            Агротехник тадбирлар (жумладанб, ер ҳаайдаш, чизеллаш, ерни текислаш ва ҳоказо ишларни
                            амалга ошириш)
                        </td>
                        <td></td>
                        <td><input type="text" class="subsidy_work_input"></td>
                        <td><input type="text" class="subsidy_work_input"></td>
                        <td><input type="text" class="subsidy_work_input"></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Тупроққа минерал ўғитлар ва бошқа кимёвий моддалар билан ишлов бериш</td>
                        <td></td>
                        <td><input type="text" class="subsidy_work_input"></td>
                        <td><input type="text" class="subsidy_work_input"></td>
                        <td><input type="text" class="subsidy_work_input"></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Саноатбоп узум ниҳолларини харид қилиш ва уларни ўтқазишни ташкил қилиш</td>
                        <td></td>
                        <td><input type="text" class="subsidy_work_input"></td>
                        <td><input type="text" class="subsidy_work_input"></td>
                        <td><input type="text" class="subsidy_work_input"></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Сув чиқариш учун бурғилаш қудуқлари қуриш</td>
                        <td></td>
                        <td><input type="text" class="subsidy_work_input"></td>
                        <td><input type="text" class="subsidy_work_input"></td>
                        <td><input type="text" class="subsidy_work_input"></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Томчилаб суғориш тизимини жорий қилиш</td>
                        <td></td>
                        <td><input type="text" class="subsidy_work_input"></td>
                        <td><input type="text" class="subsidy_work_input"></td>
                        <td><input type="text" class="subsidy_work_input"></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Ток кўчатларини шпалерга кўтариш</td>
                        <td></td>
                        <td><input type="text" class="subsidy_work_input"></td>
                        <td><input type="text" class="subsidy_work_input"></td>
                        <td><input type="text" class="subsidy_work_input"></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Бошқа харажатлар</td>
                        <td></td>
                        <td><input type="text" class="subsidy_work_input"></td>
                        <td><input type="text" class="subsidy_work_input"></td>
                        <td><input type="text" class="subsidy_work_input"></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>ЖАМИ:</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
                <br> <br>
                <p class="subsidy_footer_text">
                    Келтирилган маълумотлар ишончли бўлиб биз янги саноатбоп узум плантацияларини яратиш бўйича лойиҳа тўлиқ ҳажмда ўз вақтида ва сифатли амалга оширилишига кафолат берамиз.
                </p>
                <br> <br> <br> <br>
                <p>
                    <b>
                        Ташкилот бошлиғи
                    </b>
                    <span class="subsidy_fio">________________________________________________</span>
<!--                    <span class="subsidy_imzo">________________________</span>-->
                    <h3 class="subsidy_fio_name">(Ф.И.О)</h3>
<!--                    <h3 class="subsidy_imzo_name">(имзо)</h3>-->
                </p>
                <br> <br> <br> <br>
                <p class="subsidy_footer_text">
                    Изоҳ: Лойиҳалаштиришнинг аниқ манбалари кўрсатилмаган лойиҳалар кўриб чиқилмайди.
                </p>
                <br> <br> <br> <br>
                <div class="subsidy_save">
                    <button type="submit" class="btn btn-success save">
                        <i class="la la-save"></i> Save
                    </button>
                </div>
                <?php ActiveForm::end(); ?>
        </div>

    </div>
</div>