<?php

use yii\grid\ActionColumn;
use yii\grid\SerialColumn;
use app\modules\manuals\models\License;
use kartik\datetime\DateTimePicker;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\manuals\models\LicenseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $models */
$this->title = Yii::t('app', 'License');
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

                <a href="<?= Url::to(['license/create']) ?>"
                   class="btn btn-sm btn-primary font-weight-bolder">
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
                    </span><?= Yii::t('app', 'Create') ?></a>

                <!--end::Button-->
            </div>
        </div>
        <div class="separator separator-solid"></div>
        <div class="card-body">
            <div class="table-responsive">
            <?php $form = ActiveForm::begin(); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary' => '',
                'columns' => [

                    ['class' => SerialColumn::class],

                    'responsible',
                    [
                        'attribute' => 'department_id',
                        'value' => function ($model) {
                            return $model->department['name_' . Yii::$app->language] ?? NULL;
                        }
                    ],
                    [
                        'attribute' => 'item_category_id',
                        'value' => function ($model) {
                            return $model->itemCategory['name_' . Yii::$app->language] ?? NULL;
                        }
                    ],
                    'serial_number',
                    [
                        'attribute' => 'order_date',
                        'value' => function ($model) {
                            return Yii::$app->formatter->format($model->order_date, 'date') ?? '';
                        },
                        'filter' => DateTimePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'order_date',
                            'options' => [
                                'autocomplete' => 'off',
                            ],
                            'pluginOptions' => [
                                'todayHighlight' => true,
                                'todayBtn' => true,
                                'clearBtn' => true,
                                'format' => 'dd.mm.yyyy',
                                'autoclose' => true,
                                'disabled' => true
                            ]
                        ])
                    ],
                    [
                        'attribute' => 'given_date',
                        'value' => function ($model) {
                            return Yii::$app->formatter->format($model->given_date, 'date') ?? '';
                        },
                        'filter' => DateTimePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'given_date',
                            'options' => [
                                'autocomplete' => 'off',
                            ],
                            'pluginOptions' => [
                                'todayHighlight' => true,
                                'todayBtn' => true,
                                'clearBtn' => true,
                                'format' => 'dd.mm.yyyy',
                                'autoclose' => true,
                                'disabled' => true
                            ]
                        ])
                    ],
                    [
                        'attribute' => 'expiration_date',
                        'value' => function ($model) {
                            return Yii::$app->formatter->format($model->expiration_date, 'date') ?? '';
                        },
                        'filter' => DateTimePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'expiration_date',
                            'options' => [
                                'autocomplete' => 'off',
                            ],
                            'pluginOptions' => [
                                'todayHighlight' => true,
                                'todayBtn' => true,
                                'clearBtn' => true,
                                'format' => 'dd.mm.yyyy',
                                'autoclose' => true,
                                'disabled' => true
                            ]
                        ])
                    ],
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'filter' => [
                            License::STATUS_ACTIVE => Yii::t('app', 'Active'),
                            License::STATUS_INACTIVE => Yii::t('app', 'Inactive'),
                        ],
                        'value' => static function ($model) {
                            if ($model['status'] === License::STATUS_ACTIVE) {
                                return "<span class='badge badge-info'>" . Yii::t('app', 'Active') . "</span>";
                            }

                            if ($model['status'] === License::STATUS_INACTIVE) {
                                return "<span class='badge badge-warning'>" . Yii::t('app', 'Inactive') . "</span>";
                            }
                        }
                    ],
                    [
                        'class' => ActionColumn::class,
                        'template' => '{view} {update} {delete}',
                        'headerOptions' => ['style' => 'min-width:90px!important;'],
                        'header' => Yii::t('app', "Action"),
                        'buttons' => [
                            'view' => function ($url) {
                                return '<a href="' . $url . '" class="btn btn-outline-info btn-xs view-one"><i class="la la-eye ml-1"></i></a>';
                            },
                            'update' => function ($url) {
                                return '<a href="' . $url . '" class="btn btn-outline-primary btn-xs"><i class="la la-pencil ml-1"></i></a>';
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
            ])
            ?>
            <input type="submit" class="offcanvas click-button-ajax">
            <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <button id="kt_demo_panel_toggle" class="offcanvas"></button>
<?php
$js = <<<JS
 $('.view-one').click(function(e) {
   e.preventDefault();
    let url = $(this).attr('href');
    $('#kt_demo_panel_toggle').click();
    $('.right-modal-all').html('');
    $('.right-modal-all').load(url);
 });
// $('.date').find('input').attr('type', 'date');
// $('.date').find('input').css('max-width', '114px');
// $('.date').find('span').remove();


JS;
$this->registerJs($js, View::POS_END);

?>