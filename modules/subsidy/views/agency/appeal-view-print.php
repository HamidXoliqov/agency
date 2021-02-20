<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \app\modules\admin\models\Users;
use app\modules\subsidy\models\Appeal;
use app\models\BaseModel;

/* @var $this yii\web\View */
/* @var $appeal app\modules\subsidy\models\Appeal */
/* @var $statuses app\modules\subsidy\models\StatusTimeline[] */

$prop = 'name_'.Yii::$app->language;
$contragent = $appeal->contragent;
$project = $appeal->projectSubsidy;
$department = $contragent->department;
$status = $appeal->appealStatus;
$type = $appeal->appealType;

$this->title = $department->name_uz;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appeals'), 'url' => ['appeals']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="appeal-view">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="contragent-tab" data-toggle="tab" href="#contragent" role="tab" aria-controls="contragent" aria-selected="true"><?=Yii::t('app', 'Contragent')?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="department-tab" data-toggle="tab" href="#department" role="tab" aria-controls="department" aria-selected="true"><?=Yii::t('app', 'Department')?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="appeal-tab" data-toggle="tab" href="#appeal" role="tab" aria-controls="appeal" aria-selected="false"><?=Yii::t('app', 'Appeal')?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="project-subsidy-tab" data-toggle="tab" href="#project-subsidy" role="tab" aria-controls="project-subsidy" aria-selected="false"><?=Yii::t('app', 'Project Sudsidy')?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="timeline-tab" data-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="false">Status timeline</a>
        </li>
    </ul>

    <div class="tab-content mb-5" id="myTabContent">
        <div class="tab-pane show active " id="contragent" role="tabpanel" aria-labelledby="contragent-tab">
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

        <div class="tab-pane" id="department" role="tabpanel" aria-labelledby="department-tab">
            <?= DetailView::widget([
                'model' => $department,
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
                    $prop,
//                    [
//                        'attribute' => 'Name',
//                        'value' => $department->$prop,
//                    ],
                    'short_name',
                    'inn',
                    'okonx',
//                    'appeal_type',
//                    'status',
                    [
                        'attribute' => 'status',
                        'value' => BaseModel::getStatusList($appeal->status),
                    ],
                ],
            ]) ?>
        </div>

        <div class="tab-pane" id="appeal" role="tabpanel" aria-labelledby="appeal-tab">

            <?= DetailView::widget([
                'model' => $project,
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
                    'contragent_id',
//                    'appealStatus.name_uz',
                    [
                        'attribute' => 'Appeal status',
                        'value' => $status->$prop,
                    ],
                    [
                        'attribute' => 'Appeal type',
                        'value' => $type->$prop,
                    ],
//                    'appeal_type',
//                    'status',
                    [
                        'attribute' => 'status',
                        'value' => BaseModel::getStatusList($appeal->status),
                    ],
                ],
            ]) ?>
        </div>

        <div class="tab-pane" id="project-subsidy" role="tabpanel" aria-labelledby="project-subsidy-tab">
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
                    <form action="">

                        <ul class="list-group">
                            <li class="list-group-item">
                                1. Лойиҳа ташаббускори: <p class="subsidy_data"><?php echo $contragent->name?></p>
                            </li>
                            <li class="list-group-item">
                                2. Яратиладиган саноатбоп узум плантацияларининг умумий майдони:
                                <?=$project->counter_ga?> га.
                            </li>
                            <li class="list-group-item">
                                3. Яратиладиган саноатбоп узум плантациялари жойлашган жойи: <p class="subsidy_data"><?php echo $contragent->address?></p>
                            </li>
                            <li class="list-group-item">
                                4. Саноатбоп узум навини ўтказиш режаси:
                                <?=$project->plantSchema->$prop?>

                                <input class="subsidy_ga" type="text" name="plant_all_count"  placeholder="Умумий кучат сони"required>
                                <select class="form-select" aria-label="Default select example" name="plant_schema_id">
                                    <option selected>Select nav type</option>
                                    <option value="1">Баянғ-Ширей</option>
                                    <option value="2">6x5</option>
                                    <option value="3">4x8</option>
                                </select>га.

                            </li>
                            <li class="list-group-item">
                                5. Лойиҳани амалга ошириш муддати:
                                <?=$project->end_date?>

                            </li>
                            <li class="list-group-item">
                                6. Яратиладиган иш жойи:
                                <?=$project->job_count?> киши.
                            </li>
                            <li class="list-group-item">
                                7. Лойиҳанинг умумий қиймати -
                                <select class="form-select" aria-label="Default select example" name="project_all_price_currency_id">
                                    <option selected>Select currency</option>
                                    <option value="1">USD</option>
                                    <option value="2">EUR</option>
                                    <option value="3">CUM</option>
                                </select>
                                <input class="subsidy_data" type="text" name="project_all_price" required>
                                млн сўмб ундан.
                            </li>
                        </ul>

                    </form>

                </div>

            </div>
        </div>

        <div class="tab-pane" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
            <h3>Consectetur adipisicing elit. Beatae qui amet quos! Fugit necessitatibus adipisci eos voluptatibus laborum ab sunt doloremque, aut non dignissimos tenetur autem accusantium sint vero veritatis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sed beatae eveniet nam accusamus itaque soluta, labore ex iusto, ratione facere id amet fugiat animi cupiditate est illo voluptates neque!</h3>
            <?php foreach($statuses as $s): ?>
                <div>
                    <h3>Status: <?=$s->status?></h3>
                    <h3>Izoh:</h3>
                    <p>
                        <?=$s->comment?>
                    </p>
                    <h3>Vaqt: <?=simpleDateTime($s->action_time)?></h3>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?= DetailView::widget([
        'model' => $appeal,
        'options' => [
            'style' =>[
                'border-collapse' =>'collapse',
                'height' => '25px',
                'line-height' => '25px',
                'box-shadow' => '0 0 5px grey',
                'border-radius' => '5px',
                'overflow' => 'auto'
            ],
            'class' =>'table'
        ],
        'attributes' => [

            [
                'attribute' => 'created_by',
                'value' => function ($appeal) {
                    return (Users::findOne($appeal->created_by))
                        ? Users::findOne($appeal->created_by)->fullname . "<br><small>
                    <b style='font-size: 10px; color: #008000'>" . date('d.m.Y H:i', $appeal->created_at) . "</b></small>"
                        : $appeal->created_by;
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'updated_by',
                'value' => function ($appeal) {
                    return (Users::findOne($appeal->updated_by))
                        ? Users::findOne($appeal->updated_by)->fullname . "<br><small>
                    <b style='font-size: 10px; color: #ff0000'>" . date('d.m.Y H:i', $appeal->updated_at) . "</b></small>"
                        : $appeal->updated_by;
                },
                'format' => 'raw'
            ],

        ],
    ]) ?>
    <p>
        <?= Html::a('<i class="la la-trash-restore"></i>'.Yii::t('app', 'Delete'), ['delete', 'id' => $appeal->id], [
            'date'=>[
                'method'=>'post'
            ],
            'title' => Yii::t('app', 'Delete'),
            'class' => "btn btn-sm btn-outline-danger delete-button",
            'data-id' => Yii::$app->language
        ]) ?>
    </p>
</div>


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
    .subsidy_data{
        margin-left: 10px;
        margin-right: 10px;
        color: #002a80;
    }
    .subsidy_date{
        margin-left: 10px;
        color: #333333;
    }
    .form-select{
        margin-left: 10px;
        margin-right: 10px;
    }
</style>


<?php
$js = <<<JS
    $('.modal-title').html('{$this->title}');
JS;
$this->registerJS($js);
?>

