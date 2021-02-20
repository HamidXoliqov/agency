<?php

use app\modules\admin\models\Users;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\Contragent */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contragents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
 YiiAsset::register($this);
?>
<div class="contragent-view">
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
            'name',
            'short_name',
            'add_info',
            'address',
            [
                'attribute' => 'district_id',
                // 'value' => 'district_id'
            ],
            [
                'attribute' => 'region_id',
                // 'value' => 'district_id'
            ],
            'director',
            'tel',
            'accounter',
            'accounter_tel',
            'bank',
            'bank_code',
            'bank_account_number',
            'fund',
            'nc1Name',
            // 'nc1Code',
            'nc2Name',
            // 'nc2Code',
            'nc3Name',
            // 'nc3Code',
            'nc4Name',
            // 'nc4Code',
            'nc5Name',
            // 'nc5Code',
            'nc6Name',
            // 'nc6Code',
            'ns1Name',
            // 'ns1Code',
            'ns3Name',
            // 'ns3Code',
            'ns4Name',
            // 'ns4Code',
            'ns13Name',
            // 'ns13Code',
            'na1Name',
            // 'na1Code',
            'stateName',
            // 'stateCode',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => static function ($model) {
                    if ($model->status === $model::STATUS_ACTIVE) {
                        return "<span class='badge badge-success'>".Yii::t('app', 'Active')."</span>";
                    }

                    if ($model->status === $model::STATUS_DELETED) {
                        return "<span class='badge badge-danger'>".Yii::t('app', 'Inactive')."</span>";
                    }

                    // if ($model->status === $model::STATUS_PENDING) {
                    //     return "<span class='badge badge-warning'>".Yii::t('app', 'Pending')."</span>";
                    // }
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
            'class' =>'table table-bordered'
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
    <p>
        <?= Html::a('<i class="la la-trash-restore"></i>'.Yii::t('app', 'Delete'), ['remove', 'id' => $model['id']], [
            'title' => Yii::t('app', 'Delete'),
            'class' => "btn btn-sm btn-outline-danger delete-button mt-1",
            'data-id' => Yii::$app->language
        ]); ?>
    </p>
</div>
<?php
$js = <<<JS
    $('.modal-title').html('{$this->title}');
JS;

$this->registerJs($js);

?>