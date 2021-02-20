<?php

use app\modules\admin\models\Users;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\ReferencesType */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'References Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name_uz',
            'name_ru',
            'name_en',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->status === $model::STATUS_ACTIVE) {
                        return "<span class='badge badge-info'>Active</span>";
                    } else if ($model->status === $model::STATUS_INACTIVE){
                        return "<span class='badge badge-warning'>Inactive</span>";
                    }
                }
            ],
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
                    <i style='font-size: small; color: red'>". date('d.m.Y H:i', $model->updated_at) . "</i></small>"
                        : $model->updated_by;
                },
                'format' => 'raw'
            ],
        ],
    ]) ?>
    <p>
        <?= Html::a('<i class="la la-trash-restore-alt"></i>'.Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-block btn-outline-success btn-shadow font-weight-bolder text-uppercase',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

