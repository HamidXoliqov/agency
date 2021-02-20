<?php

use kartik\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;
use app\modules\admin\models\UserDepartment;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\UserDepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model \app\modules\admin\models\UserDepartment */

$this->title = Yii::t('app', 'User Departments');
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Modal End   -->
<button class="offcanvas" id="kt_quick_cart_toggle"></button>
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="col-lg-9 col-xl-8" style="padding: 0px!important;">

        </div>
        <div class="card-toolbar">
            <!--begin::Button-->
            <a href="<?= \yii\helpers\Url::to(['user-department/create']) ?>"
               class="btn btn-sm btn-primary font-weight-bolder create-click">
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
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
            'options' => [
                'data-pjax' => 1
            ],
        ]); ?>
        <?php Pjax::begin([

        ]); ?>
        <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
        <?

        ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
//            'filterModel' => $searchModel,
            'summary' => '',
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'user_id',
                    'value' => function ($model) {
                        return $model->user->fullname ?? NULL;
                    }

                ],
                [
                    'attribute' => 'department_id',
                    'format' => 'html',
                    'label' => Yii::t('app', 'Receiving'),
                    'value' => function ($model) {
                        return $model->getDepartmentRec($model->user_id, UserDepartment::IS_TRANSFER_RESIVING) ?? NULL;
                    }

                ],
                [
                    'attribute' => 'department_id',
                    'format' => 'html',

                    'label' => Yii::t('app', 'Outputting'),
                    'value' => function ($model) {
                        return $model->getDepartmentRec($model->user_id, UserDepartment::IS_TRANSFER_OUTPUTING) ?? NULL;
                    }

                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update} {delete}',
                    'contentOptions' => ['style' => 'width:65px;'],
                    'header' => Yii::t('app', "Action"),
                    'buttons' => [
//                        'view' => function ($url, $model) {
//                            return Html::a('<span class="la la-eye ml-1"></span>', $url.$model->user_id, [
//                                'title' => Yii::t('app', 'View'),
//                                'class' => "btn btn-outline-info btn-xs view-one",
//                                'data-toggle' => 'modal',
//                                'data-target' => '#exampleModalCustomScrollable'
//                            ]);
//                        },

                        'update' => function ($url, $model) {
                            return Html::a('<i class="la la-pencil ml-1"></i>', $url . $model->user_id, [
                                'title' => Yii::t('app', 'Update'),
                                'class' => "btn btn-outline-primary btn-xs click-button-update",

                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<i class=" la la-trash ml-1"></i>', $url . $model->user_id, [
                                'title' => Yii::t('app', 'Delete'),
                                'class' => "btn btn-outline-danger btn-xs",
                            ]);
                        },

                    ]

                ],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
         <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'offcanvas save']) ?>
        <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<button id="kt_demo_panel_toggle" class="offcanvas"></button>

<?php
$js = <<<JS
   $('#w1-filters').on('keydown,selected',function(e) {
        if (e.which() == 13 || e.which() == 9){
              $('.search-userDepartment').click();
        }
   })    
 $('.create-click').click(function(e) {
       e.preventDefault();
       let url=$(this).attr('href');
       $('#kt_quick_cart_toggle').click();
       $('.create-modal').html('');
       $('.create-modal').load(url);
 });

   $('body').delegate('.click-button-update', 'click', function(e) {
       e.preventDefault();
       let url = $(this).attr('href');
       $('#kt_quick_cart_toggle').click();
       $('.create-modal').html('');
       $('.create-modal').load(url);

   });

JS;
$this->registerJs($js, \yii\web\View::POS_END);

?>
