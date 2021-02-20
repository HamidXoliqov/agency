<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\web\View;
use yii\bootstrap\ActiveForm;
use yii\grid\ActionColumn;
use yii\grid\SerialColumn;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\manuals\models\PlantSchemaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Plan Schemas');
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

            <button href="<?= Url::to(['create']) ?>" class="btn btn-sm btn-primary font-weight-bolder view-modal-show">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="9" cy="15" r="6" />
                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
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
            <?php $form = ActiveForm::begin(); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary' => '',
                'columns' => [
                    ['class' => SerialColumn::class],
                    
                    'name_uz',
                    'name_ru',
                    'name_en',

                    [
                        'class' => ActionColumn::class,
                        'template' => '{view} {update} {delete}',
                        'contentOptions' => ['style' => 'width:90px;'],
                        'header' => Yii::t('app', "Action"),

                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('<i class="la la-eye ml-1"></i>', ['countries/view', 'id' => $model['id']], [
                                    'class' => 'btn btn-outline-info btn-xs view-modal-show',
                                ]);
                            },
                            'update' => function ($url, $model) {
                                return Html::a('<i class="la la-pencil ml-1"></i>', ['countries/update', 'id' => $model['id']], [
                                    'class' => 'btn btn-outline-primary btn-xs click-button-update',
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
                ]
            ]) ?>
            <input type="submit" class="offcanvas click-button-ajax">
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<!--end::Card-->
<button id="kt_demo_panel_toggle" class="offcanvas"></button>
<?php
$js = <<<JS

$('body').delegate('.click-button-update', 'click', function(e) {
    e.preventDefault();
    let url = $(this).attr('href');
    $('.create-modal').html('');
    $('#kt_quick_cart_toggle').click();
    $('.create-modal').load(url);
    
});
JS;
$this->registerJs($js, View::POS_END);
