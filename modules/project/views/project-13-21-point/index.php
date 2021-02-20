<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\project\models\Project1321PointSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Project1321 Points');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <div class="card-title"><?= Html::encode($this->title) ?></div>
        <div class="card-toolbar"><?= Html::a(Yii::t('app', 'Create Project 13 21 Point'), ['create'], ['class' => 'btn btn-success']) ?></div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'assimilation_forecast_year',
                'assimilation_forecast',
                'mastered_fact',
                'cmr',
                //'equipment',
                //'import',
                //'other',
                //'predict_period',
                //'forecast_year',
                //'project_id',
                //'order_number',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
</div>
