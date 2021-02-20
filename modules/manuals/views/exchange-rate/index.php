<?php

use app\modules\manuals\models\ExchangeRate;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\manuals\models\ExchangeRateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Exchange Rates');
$this->params['breadcrumbs'][] = $this->title;
?>
<button id="#kt_demo_panel_toggle" class="offcanvas"></button>
<button class="offcanvas" id="kt_quick_cart_toggle"></button>
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">

        </div>
        <div class="card-toolbar">
            <!--begin::Dropdown-->
            <!--begin::Button-->

            <button href="<?= Url::to(['create']) ?>"
                    class="btn btn-sm btn-primary font-weight-bolder view-modal-show create-click">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <circle fill="#000000" cx="9" cy="15" r="6"/>
                                <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                      fill="#000000" opacity="0.3"/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span><?= Yii::t('app', 'Create') ?></button>

            <!--end::Button-->
        </div>
    </div>
    <div class="separator separator-solid"></div>
    <div class="card-body">
        <div class="table-responsive">
        <?php $form = \yii\bootstrap\ActiveForm::begin(); ?>
            <?php Pjax::begin([]); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary' => '',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'currency_id',
                        'filter' =>  ExchangeRate::getCurrencyItems(),
                        'value' => function ($model) {
                            $item = $model::getCurrencyOneItem($model->currency_id);
                            return $item['name_' . Yii::$app->language] ?? NULL;
                        }
                    ],
                    'amount',
                    [
                        'attribute' => 'to_currency_id',
                        'filter' =>ExchangeRate::getCurrencyItems(),
                        'value' => function ($model) {
                            $item = $model::getCurrencyOneItem($model->to_currency_id);
                            return $item['name_' . Yii::$app->language] ?? NULL;
                        }
                    ],
                    'to_amount',
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'contentOptions' => [
                            'width' => '96px;',
                            'align' => 'center'
                        ],
                        'filter' => [
                            ExchangeRate::STATUS_ACTIVE => Yii::t('app', 'Active'),
                            ExchangeRate::STATUS_INACTIVE => Yii::t('app', 'Inactive'),
                        ],
                        'value' => static function ($model) {
                            if ($model['status'] === ExchangeRate::STATUS_ACTIVE) {
                                return "<span class='badge badge-info'>" . Yii::t('app', 'Active') . "</span>";
                            }

                            if ($model['status'] === ExchangeRate::STATUS_INACTIVE) {
                                return "<span class='badge badge-warning'>" . Yii::t('app', 'Inactive') . "</span>";
                            }
                        }
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {update} {remove}',
                        'header' => Yii::t('app', "Action"),
                        'headerOptions' => [
                            'style' => 'width:96px!important',
                        ],
                        'buttons' => [
                            'view' => function ($url) {
                                return '<a href="' . $url . '" class="btn btn-xs btn-outline-info view-modal-show"><i class="la la-eye ml-1"></i></a>';
                            },
                            'remove' => function ($url) {
                                return Html::a('<i class="la la-trash ml-1"></i>', $url, [
                                    'title' => Yii::t('app', 'Delete'),
                                    'class' => "btn btn-xs btn-outline-danger delete-button",
                                    'data-id' => Yii::$app->language
                                ]);
                            },
                            'update' => function ($url) {
                                return '<a href="' . $url . '" class="btn btn-xs btn-outline-primary view-modal-show"><i class="la la-pencil ml-1"></i></a>';
                            }
                        ]
                    ],
                ],
            ]); ?>
        <?php Pjax::end(); ?>
        <input type="submit" class="offcanvas click-button-ajax">
        <?php \yii\bootstrap\ActiveForm::end(); ?>
        </div>
    </div>
</div>

    <button id="kt_demo_panel_toggle" class="offcanvas"></button>
