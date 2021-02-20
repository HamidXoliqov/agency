<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\modules\subsidy\models\Appeal;

/* @var $this yii\web\View */
/* @var $model app\modules\subsidy\models\SubsidyProtocol */

$this->title = $model->protocol_number;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Subsidy Protocols'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

/* @var $appeals Appeal[]*/
$appeals = Appeal::find()->where(['subsidy_protocol_id' => $model->id])->all();
$appeals_count = count($appeals);

?>
<div class="subsidy-protocol-view">

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

    <?php
//    echo DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'id',
//            'protocol_number',
//            'protocol_date',
//            'file',
//            'created_at',
//            'created_by',
//            'updated_at',
//            'updated_by',
//        ],
//    ]);
    $labels = $model->attributeLabels();
    ?>

    <table class="table table-bordered table-striped" style="width: auto;">
        <tr>
            <th width="220">
                <?=$labels['protocol_number']?>
            </th>
            <td width="220">
                <?=$model->protocol_number?>
            </td>
        </tr>
        <tr>
            <th>
                <?=$labels['protocolDateSimple']?>
            </th>
            <td>
                <?=$model->protocolDateSimple?>
            </td>
        </tr>
        <tr>
            <th width="220">
                <?=$labels['total_sum']?>
            </th>
            <td width="220">
                <?=$model->getTotalSumAsMillionSum()?> млн сум
            </td>
        </tr>
        <tr>
            <th>
                <?=Yii::t('app', 'Protocol')?>
            </th>
            <td>
                <?php if($model->file) : ?>
                    <div class="form-group">
                        <a href="<?=Url::to(['/'.$model->file])?>" target="_blank"><?=Yii::t('app', 'Protocol')?></a>
                    </div>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>
                <?=$labels['created_at']?>
            </th>
            <td>
                <?=simpleDateTime($model->created_at)?>
            </td>
        </tr>
        <tr>
            <th>
                <?=$labels['updated_at']?>
            </th>
            <td>
                <?=simpleDateTime($model->updated_at)?>
            </td>
        </tr>
    </table>


    <h3><?=Yii::t('app', 'Appeals in protocol')?></h3>
    <table class="table table-bordered table-striped">
        <tr>
            <th>ID</th>
            <th>Kontragent</th>
        </tr>
        <?php foreach($appeals as $appeal): ?>
            <tr>
                <td>
                    <?=$appeal->id?>
                </td>
                <td>
                    <?=$appeal->contragent->name;?>
                </td>
            </tr>
        <?php endforeach; ?>

        <?php if($appeals_count == 0) : ?>
            <tr>
                <td colspan="2">
                    Бу протоколга аризалар ҳали бириктирилмаган.
                </td>
            </tr>
        <?php endif; ?>

    </table>
    <br/>
    <br/>
</div>
