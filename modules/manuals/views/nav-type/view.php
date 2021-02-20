<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \app\modules\admin\models\Users;
/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\NavType */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nav Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
//var_dump($model); die();
?>

<div class="nav-type-view">

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
            'name_uz',
            'name_ru',
            'name_en',
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
                    <b style='font-size: 10px; color: #008000'>" . date('d.m.Y H:i', $model->created_at) . "</b></small>"
                        : $model->created_by;
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'updated_by',
                'value' => function ($model) {
                    return (Users::findOne($model->updated_by))
                        ? Users::findOne($model->updated_by)->fullname . "<br><small>
                    <b style='font-size: 10px; color: #ff0000'>" . date('d.m.Y H:i', $model->updated_at) . "</b></small>"
                        : $model->updated_by;
                },
                'format' => 'raw'
            ],

        ],
    ]) ?>
    <p>
        <?= Html::a('<i class="la la-trash-restore"></i>'.Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'date'=>[
                'method'=>'post'
            ],
            'title' => Yii::t('app', 'Delete'),
            'class' => "btn btn-sm btn-outline-danger delete-button",
            'data-id' => Yii::$app->language
        ]) ?>
    </p>
</div>

<?php
$js = <<<JS
    $('.modal-title').html('{$this->title}');
JS;
$this->registerJS($js);
?>

