<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\subsidy\models\SubsidyProtocol */

$this->title = Yii::t('app', 'Update Subsidy Protocol: {name}', [
    'name' => $model->protocol_number,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Subsidy Protocols'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->protocol_number, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="subsidy-protocol-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'commission_members' => $commission_members
    ]) ?>

</div>
    <?php
//    echo Yii::$app->controller->renderPartial('_modal_form', [
//        'model' => $model,
//        'commission_members' => $commission_members,
//        ]);
    ?>
