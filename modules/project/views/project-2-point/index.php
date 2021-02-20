<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\project\models\Project2PointSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Project2 Points');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <div class="card-title"><?= Html::encode($this->title) ?></div>
        <div class="card-toolbar"><?= Html::a(Yii::t('app', 'Create Project 2 Point'), ['create'], ['class' => 'btn btn-success']) ?></div>
    </div>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'name',
                'project_id',
                'contragent_id',
                'order_number',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
</div>
