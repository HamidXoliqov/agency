<?php

use app\modules\admin\models\Users;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\UserDepartment */
$this->title = Yii::t('app', 'UserDepartment: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Departments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="card-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return $model->user->fullname;
                }

            ],
            [
                'attribute' => 'department_id',
                'format'=>'raw',
                'value' => function ($model) {
                    return $model->department["name_" . Yii::$app->language];
                }

            ],
            [
                'attribute' => 'is_transfer',
                'format'=>'raw',
                'value' => function ($mod) {
                    if ($mod->is_transfer == 0){
                        $s = Yii::t('app', 'Receiving');
                        return '<span class="badge badge-success" style="font-size:small">'.$s.'</span>';
                    }else if ($mod->is_transfer == 1){
                        $s = Yii::t('app', 'Outputting');
                        return '<span class="badge badge-info" style="font-size:small">'.$s.'</span>';
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
                    <i style='font-size: small; color: red'>" . date('d.m.Y H:i', $model->updated_at) . "</i></small>"
                        : $model->updated_by;
                },
                'format' => 'raw'
            ],
        ],
    ]) ?>
    <p>
        <?= Html::a('<i class="la la-remove"></i>'.Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-outline-danger btn-sm form-control',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
