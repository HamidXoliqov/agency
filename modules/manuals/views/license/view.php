<?php

use app\modules\admin\models\Users;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\License */

$this->title = Yii::t('app', 'Licences: {name}', [
    'name' => $model->serial_number,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Licenses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
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
            'overflow' => 'auto',
        ],
        'class' =>'table table-bordered'
    ],
    'attributes' => [
        'serial_number',
        'serial',
        [
            'attribute' => 'department_id',
            'label' => Yii::t('app', 'Department'),
            'value' => function ($mod) {
                $til = 'name_' . Yii::$app->language;
                return $mod->department->$til;
            }
        ],
        'order_number',
        [
            'attribute' => 'item_category_id',
            'label' => Yii::t('app', 'Item Category'),
            'value' => function ($mod) {
                $til = 'name_' . Yii::$app->language;
                return $mod->itemCategory->$til;
            }
        ],

        'order_date',
        'given_date',
        'expiration_date',
        'responsible',
        [
            'attribute' => 'status',
            'format' => 'raw',
            'value' => function ($model) {
                if ($model->status === $model::STATUS_ACTIVE) {
                    return "<span class='badge badge-info'>".Yii::t('app', 'Active')."</span>";
                }

                if ($model->status === $model::STATUS_INACTIVE) {
                    return "<span class='badge badge-warning'>".Yii::t('app', 'Inactive')."</span>";
                }
            }
        ],


    ],
]) ?>
<br>
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
<?= Html::a('<i class="la la-trash-restore-alt"></i>' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
    'title' => Yii::t('app', 'Delete'),
    'class' => "btn btn-sm btn-outline-danger delete-button",
    'data-id' => Yii::$app->language
]) ?>

<?php
$js = <<<JS
    $('.modal-title').html('{$this->title}');
JS;

$this->registerJs($js);

?>
