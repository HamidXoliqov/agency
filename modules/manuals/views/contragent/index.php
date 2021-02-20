<?php

use yii\bootstrap\ActiveForm;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;
use app\modules\manuals\models\Contragent;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\manuals\models\ContragentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contragents');
$this->params['breadcrumbs'][] = $this->title;
?>
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">

            </div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->
                <!--begin::Button-->
                <a href="<?= Url::to(['contragent/table']) ?>" class="btn btn-sm btn-dark font-weight-bolder mr-2">
                    <span class="svg-icon svg-icon-md">
                        <i class="fa fa-table"></i>
                    </span><?= Yii::t('app', 'Chess Table') ?>
                </a>
                <a href="<?= Url::to(['contragent/create']) ?>"
                        class="btn btn-sm btn-primary font-weight-bolder">
                        <span class="svg-icon svg-icon-md">
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
                    </span><?= Yii::t('app', 'Create') ?>
                </a>
                
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
                // 'summary' => '',
                'columns' => [
                    ['class' => SerialColumn::class],
                    'inn',
                    'short_name',
                    'oked',
                    'director',
                    'tel',
                    'address',
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'contentOptions' => [
                            'width' => '96px;',
                            'align' => 'center'
                        ],
                        'filter' => Contragent::getStatusList(),/*[
                            Contragent::STATUS_ACTIVE => Yii::t('app', 'Active'),
                            Contragent::STATUS_INACTIVE => Yii::t('app', 'Inactive'),
                        ],*/
                        'value' => static function ($model) {
                            $status = Contragent::getStatusList($model->status);
                            switch ($model->status) {
                                case Contragent::STATUS_ACTIVE:
                                    $class = 'badge-success';
                                    break;
                                case Contragent::STATUS_INACTIVE:
                                    $class = 'badge-danger';
                                    break;
                                case Contragent::STATUS_DELETED:
                                    $class = 'badge-danger';
                                    break;
                                default:
                                    $class = 'badge-warning';
                                    break;
                            }
                            return "<span class='badge ".$class."'>" . (!empty($status) ? $status : '') . "</span>";
                        }
                    ],

                    [
                        'class' => ActionColumn::class,
                        'template' => '{view} {update} {copy} {remove}',
                        'contentOptions' => ['style' => 'width:120px;'],
                        'header' => Yii::t('app', "Action"),
                        'buttons' => [
                            'view' => function ($url,$model) {
                                return Html::a('<i class="la la-eye ml-1"></i>', ['contragent/view', 'id' => $model['id']], [
                                    'class' => 'btn btn-outline-info btn-xs',
                                ]);
                            },
                            'update' => function ($url,$model) {
                                return Html::a('<i class="la la-pencil ml-1"></i>', ['contragent/update', 'id' => $model['id']], [
                                    'class' => 'btn btn-outline-primary btn-xs',
                                ]);
                            },
                            'copy' => function ($url,$model) {
                                return Html::a('<i class="la la-copy ml-1"></i>', ['contragent/copy', 'id' => $model['id']], [
                                    'class' => 'btn btn-outline-success btn-xs',
                                ]);
                            },
                            'remove' => function ($url,$model) {
                                return Html::a('<i class="la la-trash ml-1"></i>', ['contragent/remove', 'id' => $model['id']], [
                                    'title' => Yii::t('app', 'Delete'),
                                    'class' => "btn btn-xs btn-outline-danger delete-button",
                                    'data-id' => Yii::$app->language
                                ]);
                            },
                        ]
                    ],
                ],
            ]) ?>
            <!--<input type="submit" class="offcanvas click-button-ajax">-->
            <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <button id="kt_demo_panel_toggle" class="offcanvas"></button>
<?php
$js = <<<JS
  $('.create-click').click(function(e) {
        e.preventDefault();
        let url = $(this).attr('href');
        $('#kt_demo_panel_toggle').click();
        $('.right-modal-all').html('');
        $('.right-modal-all').load(url);
  });

    $('.click-update').click(function(e) {
        e.preventDefault();
        let url = $(this).attr('href');
        $('#kt_demo_panel_toggle').click();
        $('.right-modal-all').html('');
        $('.right-modal-all').load(url);
    });

JS;
//$this->registerJs($js, View::POS_END);

$css = <<<CSS
.table th, .table td {
    vertical-align: middle;
    font-size: 11px;
}
.table thead th {
     vertical-align: middle;
     font-size:11px;
}
CSS;
$this->registerCss($css);