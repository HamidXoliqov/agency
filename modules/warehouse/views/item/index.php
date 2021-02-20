<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\warehouse\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app-msg', 'Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app-msg', 'Create Item'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name_en',
            'name_ru',
            'name_uz',
            'short_name',
            //'category_id',
            //'size',
            //'weight',
            //'unit_id',
            //'article',
            //'country_id',
            //'add_info',
            //'status',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',
            //'stock_limit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
