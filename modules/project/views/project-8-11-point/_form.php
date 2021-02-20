<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\project\models\Project811Point */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'own_funds')->textInput() ?>

    <?= $form->field($model, 'fdi')->textInput() ?>

    <?= $form->field($model, 'fund_resources')->textInput() ?>

    <?= $form->field($model, 'bank_loans')->textInput() ?>
    <?= $form->field($model, 'project_id')->hiddenInput(['value' => $project_id])->label(false) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
