<?php

use app\models\BaseModel;
use app\modules\manuals\models\Contragent;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\project\models\Project2Point */
/* @var $form yii\widgets\ActiveForm */
/* @var $project_id integer */
?>
<div class="card-body">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'project_id')->hiddenInput(['value' => $project_id])->label(false) ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'contragent_id')->dropDownList(ArrayHelper::map(Contragent::findAll(['status' => BaseModel::STATUS_ACTIVE]), 'id', 'name')) ?>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
