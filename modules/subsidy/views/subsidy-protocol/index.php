<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\subsidy\models\SubsidyProtocol;
use app\widgets\Actions;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\subsidy\models\SubsidyProtocolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Subsidy Protocols');
$this->params['breadcrumbs'][] = $this->title;

$statuses = [
    SubsidyProtocol::PROTOCOL_STATUS_DELETED => 'Удалень',
    SubsidyProtocol::PROTOCOL_STATUS_NEW =>     'Новый',
    SubsidyProtocol::PROTOCOL_STATUS_EDIT =>    'Редактиванный',
    SubsidyProtocol::PROTOCOL_STATUS_ACTIVE =>  'Утвержденный',
];
$status_texts = [
    SubsidyProtocol::PROTOCOL_STATUS_DELETED => '<span class="label label-inline font-weight-bolder label-light-danger" style="font-size:1.25rem;">Удалень</span>',
    SubsidyProtocol::PROTOCOL_STATUS_NEW => '<span class="label label-inline font-weight-bolder label-light-info" style="font-size:1.0rem;">Новый</span>',
    SubsidyProtocol::PROTOCOL_STATUS_EDIT => '<span class="label label-inline font-weight-bolder label-light-primary" style="font-size:1.25rem;">Редактиванный</span>',
    SubsidyProtocol::PROTOCOL_STATUS_ACTIVE => '<span class="label label-inline font-weight-bolder label-light-success" style="font-size:1.25rem;">Утвержденный</span>'
];
?>
<div class="subsidy-protocol-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Subsidy Protocol'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
//        'sort' => ['attributes' => 'id', 'protocol_number', 'protocol_date'],
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'protocol_number',
//            'protocol_date',
            [
                'attribute' => 'protocol_date',
//                'protocolDateSimple',
                'content' => function(\app\modules\subsidy\models\SubsidyProtocol $data) {
                    return $data->getProtocolDateSimple();
                }
            ],
//            'file',
//            'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            [
                'attribute' => 'status',
//                'protocolDateSimple',
                'filter' => $statuses,
                'content' => function(\app\modules\subsidy\models\SubsidyProtocol $data) use ($status_texts) {
                    $st = $data->status;
                    if($st === null)
                        $st = SubsidyProtocol::PROTOCOL_STATUS_NEW;
                    return $status_texts[$st];
                }
            ],

            [
                'class' => ActionColumn::class,
                'template' => '{send} {view} {update} {delete}',
                'contentOptions' => ['style' => 'width:120px;'],
                'header' => Yii::t('app', "Action"),

                'buttons' => [
                    'send' => function ($url, $model) {
                        return Html::a('<i class="la la-check ml-1"></i>', ['appeal-protocol/one-protocol', 'id' => $model['id']], [
                            'class' => 'btn btn-outline-success btn-xs ',
                        ]);
                    },
                    'view' => function ($url, $model) {
                        return Html::a('<i class="la la-eye ml-1"></i>', ['subsidy-protocol/view', 'id' => $model['id']], [
                            'class' => 'btn btn-outline-info btn-xs',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<i class="la la-pencil ml-1"></i>', ['subsidy-protocol/update', 'id' => $model['id']], [
                            'class' => 'btn btn-outline-primary btn-xs',
                        ]);
                    },
                    'delete' => function ($url) {
                        return Html::a('<i class="la la-trash ml-1"></i>', $url, [
                            'title' => Yii::t('app', 'Delete'),
                            'class' => "btn btn-xs btn-outline-danger delete-button",
                            'data-id' => Yii::$app->language
                        ]);
                    },
                ]
            ],

        ],
    ]); ?>


</div>
