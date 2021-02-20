<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\subsidy\models\ProjectSubsidySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Project Subsidies');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <div class="card-title"><?= Html::encode($this->title) ?></div>
    </div>
    <div class="card-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'appeal_id',
            'contragent_id',
            'region_id',
            'district_id',
            //'contur_number',
            //'counter_ga',
            //'water_pump_count',
            //'bonitet_ball',
            //'plant_all_area_ga',
            //'plant_address',
            //'plant_schema_id',
            //'plant_all_count',
            //'end_date',
            //'job_count',
            //'project_all_price',
            //'project_all_price_currency_id',
            //'status_project',
            //'status',

            [
                'class' => ActionColumn::class,
                'template' => '{subsidy} {view} {update} {delete}',
                'contentOptions' => ['style' => 'width:120px;'],
                'header' => Yii::t('app', "Action"),
                'buttons' => [
                    'subsidy' => function ($url) {
                        return Html::a('<i class="la la-save ml-1" aria-hidden="true"></i>', $url, ['class' => "btn btn-xs btn-default"]);
                    },
                    'view' => function ($url) {
                        return Html::a('<i class="la la-eye ml-1" aria-hidden="true"></i>', $url, ['class' => "btn btn-xs btn-default"]);
                    },
                    'update' => function ($url) {
                        return Html::a('<i class="la la-pencil ml-1" aria-hidden="true"></i>', $url, ['class' => "btn btn-xs btn-default"]);
                    },
                    'delete' => function ($url) {
                        return Html::a('<i class="la la-trash ml-1" aria-hidden="true"></i>', $url, ['class' => "btn btn-xs btn-default"]);
                    }
                ],
            ],
        ],
    ]); ?>
    </div>

</div>

<div class="card card-custom gutter-b example example-compact items-view-block">
    <div class="card-body"></div>
</div>
