<?php

use yii\bootstrap\ActiveForm;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

$i = 0;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $models */

$this->title = Yii::t('app', 'Roles');
$this->params['breadcrumbs'][] = $this->title;
?>

    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    <?= Yii::t('app', 'Roles') ?>
                    <span class="d-block text-muted font-size-sm"><?= Yii::t('app', 'Role description') ?></span>
                </h3>
            </div>
            <div class="card-toolbar ">
                <!--begin::Button-->
                <a href="<?= Url::to(['auth-item/create']) ?>"
                   class="btn btn-sm btn-primary font-weight-bolder view-modal-show">
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
                'tableOptions' => ['class' => 'table table-vertical-center table-bordered'],
                'filterModel' => $searchModel,
                'summary' => '',
                'columns' => [

                    [
                        'class' => SerialColumn::class,
                        'options' => ['style' => 'width:40px'],
                    ],

                    [
                        'attribute' => 'name',
                        'options' => ['style' => 'width:25%'],
                    ],
                    'description',
                    [
                        'attribute' => 'permissions',
                        'format' => 'raw',
                        'label' => Yii::t('app', 'Permissions'),
                        'value' => function ($model) {
                            return Html::a('<i class="la la-pencil-square-o"></i>' . Yii::t('app', 'Permissions'), ['update', 'id' => $model->name], [
                                'title' => Yii::t('app', 'Update'),
                                'class' => "btn  btn-outline-primary form-control pt-2",
                            ]);

                        },
                    ],
                    [
                        'class' => ActionColumn::class,
                        'header' => Yii::t('app', "Action"),
                        'template' => '{remove}',
                        'options' => ['style' => 'width:20px; text-align:center'],
                        'buttons' => [
//                            'update' => function ($url) {
//                                return Html::a('<i class="la la-pencil ml-1"></i>', $url, [
//                                    'title' => Yii::t('app', 'Update'),
//                                    'class' => "btn btn-xs btn-outline-primary",
//                                ]);
//                            },
                            'remove' => function ($url) {
                                return Html::a('<i class="la la-trash-restore"></i>', $url, [
                                    'title' => Yii::t('app', 'Delete'),
                                    'class' => "btn delete-button",
                                    'data-id' => Yii::$app->language
                                ]);
                            }
                        ]
                    ],
                ],
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
    $('body').delegate('#view-one', 'click', function() {
        let url = $(this).attr('href');
        $.ajax({
			url: url,
			type: 'GET',
			success: function(e){
			    if (e) {
			        $('.modal-content-span').html(e);
			    }
			}
		});
    });
   $('body').delegate('#update-one', 'click', function() {
        let url = $(this).attr('href');
        $.ajax({
			url: url,
			type: 'GET',
			success: function(e){
			    if (e) {
			        $('.modal-content-span').html(e);
			    }
			}
		});
    });
JS;
$this->registerJs($js);
$css = <<<CSS
    .popover{
    display: none;
}
CSS;
$this->registerCss($css)
?>