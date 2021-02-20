<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\project\models\Project2226PointSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Project2226 Points');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <div class="card-title"><?= Html::encode($this->title) ?></div>
        <div class="card-toolbar"><?= Html::a(Yii::t('app', 'Create Project 22 26 Point'), ['create'], ['class' => 'btn btn-success']) ?></div>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="card-body">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'forecast_attracting_finance',
                'Forecast_attracting_finance',
                'involved fact',
                'forecast_period',
                //'forecast_year',
                //'project_id',
                //'order_number',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
</div>
