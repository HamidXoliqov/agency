<?php

use app\modules\admin\models\Employee;
use app\modules\admin\models\Users;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\Contragent */

$this->title = $model->fullName;
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
                'height' => '20px',
                'line-height' => '15px',
                'box-shadow' => '0 0 5px grey',
                'border-radius' => '5px',
                'overflow' => 'auto',
            ],
            'class' =>'table table-bordered'
        ],
        'attributes' => [
            'id',
            'tin',
            'ns10Code',
            'ns10Name',
            'ns11Code',
            'ns11Name',
            'fullName',
            'birthDate',
            'sex',
            'sexName',
            'passSeries',
            'passNumber',
            'passDate',
            'passOrg',
            'phone',
            'zipCode',
            'address',
            'ns13Code',
            'ns13Name',
            'tinDate',
            'dateModify',
            'isitd',
            'duty:boolean',
            'personalNum',
            'docCode',
            'docName',
            'isNotary',
            [
                'label' => 'Department',
                'attribute' => 'department.name_'.Yii::$app->language,
            ],
            [
                'attribute' => 'duty',
                'format' => 'raw',
                'value' => static function ($model) {
                    if ($model->duty === false) {
                        return "<span class='badge badge-success'>".Yii::t('app', 'Not In Debt')."</span>";
                    }

                    if ($model->duty === true) {
                        return "<span class='badge badge-danger'>".Yii::t('app', 'Debtor')."</span>";
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
        <?= Html::a('<i class="la la-trash-restore"></i>'.Yii::t('app', 'Delete'), ['delete', 'id' => $model['id']], [
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