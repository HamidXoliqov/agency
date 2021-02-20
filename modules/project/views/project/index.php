<?php

use app\components\PermissionHelper as P;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\project\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Projects');
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <div class="card-title"><?= Html::encode($this->title) ?></div>
            <div class="card-toolbar"><?= Html::a(Yii::t('app', 'Create Project'), ['create'], ['class' => 'btn btn-success']) ?></div>
        </div>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="card-body">
            <?= GridView::widget([
                'id' => "table-1",
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => [
                    'class' => "table"
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//            'id',
                    'name',
                    'deadline_date',
                    'project_capacity',
                    'total_cost',
                    //'total_cost_currency_id',
                    //'reamin_on_year_begin',
                    //'remain_on_year_begin_currency_id',
                    //'assimilation',
                    //'production_time',
                    //'delivery_time',
                    //'installation_time',
                    //'add_info',
                    //'status',
                    //'created_at',
                    //'created_by',
                    //'updated_at',
                    //'updated_by',
                    //'lending_bank_id',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => Yii::t('app', "Action"),
                        'buttons' => [
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
                        'visibleButtons' => [
                            'view' => P::can("project/view"),
                            'update' => P::can("project/update"),
                            'delete' => P::can("project/delete"),
                        ],
                    ],
                ],
            ]); ?>
        </div>

    </div>

    <div class="card card-custom gutter-b example example-compact items-view-block">
        <div class="card-body"></div>
    </div>

<?php
$this->registerJsVar("itemsViewUrl", Url::to(['/project/project/items-view']));
$js = <<<JS
var selectedTr;
    let table = $("#table-1");
    let tr = table.find("tbody tr");
    console.log(tr)
    tr.click(function() {
      if (selectedTr) selectedTr.removeClass("bg-gray-400");
      selectedTr = $(this);
      selectedTr.addClass("bg-gray-400");
      $(".items-view-block .card-body").load(itemsViewUrl+"?project_id="+$(this).attr("data-key"));
    })
JS;
$this->registerJs($js, View::POS_END);

$css = <<<CSS
#table-1 table tbody tr {
    cursor: pointer;
}
.border-1 {
    border: 1px solid cornflowerblue;
}
CSS;
$this->registerCss($css);