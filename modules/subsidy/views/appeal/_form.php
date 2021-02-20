<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use \app\modules\manuals\models\AppealType;
use \app\modules\manuals\models\AppealStatus;
/* @var $this yii\web\View */
/* @var $model app\modules\subsidy\models\Appeal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'contragent_id')->hiddenInput(['value'=> $contr_agent->id])->label(false); ?>

    <?= $form->field($model, 'appeal_status')->hiddenInput(['value'=> AppealStatus::APPEAL_NEW])->label(false); ?>

    <?= $form->field($model, 'appeal_type')->widget(Select2::class, [
        'data' => ArrayHelper::map(AppealType::find()->asArray()->all(), 'id', "name_uz")
    ]) ?>

    <?= $form->field($model, 'status')->hiddenInput(['value'=> 1])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
