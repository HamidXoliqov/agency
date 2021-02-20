<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\warehouse\models\Item */

$prop = "name_".Yii::$app->language;
$this->title = $model->$prop;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app-msg', 'Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app-msg', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app-msg', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app-msg', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name_en',
            'name_ru',
            'name_uz',
            'short_name',
            'category_id',
            'size',
            'weight',
            'unit_id',
            'article',
            'country_id',
            'add_info',
            'status',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
            'stock_limit',
        ],
    ]) ?>

</div>
