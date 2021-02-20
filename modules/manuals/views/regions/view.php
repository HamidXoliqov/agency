<?php

use app\modules\admin\models\Users;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\Regions */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Regions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="regions-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'name_' . Yii::$app->language,
                'label' =>Yii::t('app', 'Regions')
            ],
            'parent_id',
            'status',
            [
                'attribute' => 'created_by',
                'value' => function ($model) {
                    return (Users::findOne($model->created_by))
                        ? Users::findOne($model->created_by)->fullname . "<br><small>
                    <i style='font-size: small; color: green'>" . date('d.m.Y H:i', $model->created_at) . "</i></small>"
                        : $model->created_by;
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'updated_by',
                'value' => function ($model) {
                    return (Users::findOne($model->updated_by))
                        ? Users::findOne($model->updated_by)->fullname . "<br><small>
                    <i style='font-size: small; color: red'>" . date('d.m.Y H:i', $model->updated_at) . "</i></small>"
                        : $model->updated_by;
                },
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>
