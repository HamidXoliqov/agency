<?php

use app\modules\admin\models\Users;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\References */

$this->title = $model['name_'.Yii::$app->language];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'References'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>



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
        'class' =>'table'
    ],
    'attributes' => [

        'name_'.Yii::$app->language,
        'token',
        'referencesType.name_'.Yii::$app->language,
        'sort',
        [
            'attribute' => 'status',
            'format' => 'raw',
            'value' => function ($model) {
                if ($model->status === $model::STATUS_ACTIVE) {
                    return "<span class='badge badge-info'>Active</span>";
                }

                if ($model->status === $model::STATUS_INACTIVE) {
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
        'class' =>'table'
    ],
    'attributes' => [
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
    <?= Html::a('<i class="la la-trash-restore"></i>'.Yii::t('app', 'Delete'), ['remove', 'id' => $model->id], [
        'class' => 'btn btn-sm btn-outline-danger',
        'data' => [
            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
            'method' => 'post',
        ],
    ]) ?>
</p>

<?php
$js = <<<JS
$(document).ready(function() {
    $('.modal-title').html('{$this->title}');
});
JS;

$this->registerJs($js);

?>
