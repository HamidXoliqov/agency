<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\models\Users;

/* @var $this yii\web\View */
/* @var $model app\modules\structure\models\OrgClassificationSearch */
/* @var $form yii\widgets\ActiveForm */
$this->title = Yii::t('app', 'View: {name}', [
    'name' => $model->id,
]);
?>
<div class="org-classification-search">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'parent_id',
            'name_uz',
            'name_ru',
            'name_en',
            'stat_code',
            'tax_code',
        ],
    ]) ?>
    <?= DetailView::widget([
        'model' => $model,
        'options' => [
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

</div>
