<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\subsidy\models\AppealProtocol */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appeal-protocol-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'appeal_id')->textInput() ?>

    <?= $form->field($model, 'subsidy_protocol_id')->textInput() ?>

    <?= $form->field($model, 'total_sum')->textInput() ?>

    <?= $form->field($model, 'self_sum')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
