<?php

use app\modules\admin\models\Users;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\Countries */

$this->title = Yii::t('app', 'Countries: {name}', [
    'name' => $model['name_' . Yii::$app->language],
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Countries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<?= DetailView::widget([
    'model' => $model,
    'options' => [
        'style' => [
            'border-collapse' => 'collapse',
            'height' => '25px',
            'line-height' => '25px',
            'box-shadow' => '0 0 5px grey',
            'border-radius' => '5px',
            'overflow' => 'auto',
        ],
        'class' => 'table table-bordered'
    ],
    'attributes' => [
        [
            'attribute' => 'name_' . Yii::$app->language,
            'label' => Yii::t('app', 'Countries')
        ],
        'code',
        [
            'attribute' => 'status',
            'format' => 'raw',
            'value' => static function ($model) {
                if ($model['status'] === $model::STATUS_ACTIVE) {
                    return "<span class='badge badge-info'>" . Yii::t('app', 'Active') . "</span>";
                }

                if ($model['status'] === $model::STATUS_INACTIVE) {
                    return "<span class='badge badge-warning'>" . Yii::t('app', 'Inactive') . "</span>";
                }
            }
        ],
    ],
]) ?>
<?= DetailView::widget([
    'model' => $model,
    'options' => [
        'style' =>[
            'border-collapse' =>'collapse',
            'height' => '25px',
            'line-height' => '25px',
            'box-shadow' => '0 0 5px grey',
            'border-radius' => '5px',
            'overflow' => 'auto'
        ],
        'class' => 'table table-bordered',
    ],
    'attributes' => [

        [
            'attribute' => 'created_by',
            'value' => function ($model) {
                return (Users::findOne($model->created_by))
                    ? Users::findOne($model->created_by)->fullname . "<br><small>
                    <b style='font-size: 10px; color: green'>" . date('d.m.Y H:i', $model->created_at) . "</b></small>"
                    : $model->created_by;
            },
            'format' => 'raw'
        ],
        [
            'attribute' => 'updated_by',
            'value' => function ($model) {
                return (Users::findOne($model->updated_by))
                    ? Users::findOne($model->updated_by)->fullname . "<br><small>
                    <b style='font-size: 10px; color: red'>" . date('d.m.Y H:i', $model->updated_at) . "</b></small>"
                    : $model->updated_by;
            },
            'format' => 'raw'
        ],

    ],
]) ?>
<?php
$js = <<<JS
    $('.modal-title').html('{$this->title}');
JS;

$this->registerJs($js);

?>