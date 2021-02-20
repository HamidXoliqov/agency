<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\warehouse\models\Item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_name')->textInput(['maxlength' => true]) ?>

<!--    --><?php //echo  $form->field($model, 'category_id')->textInput() ?>

    <div class="form-group field-item-category_id has-success">
        <label class="control-label" for="item-category_id">Родительская категория</label>
        <select id="item-category_id" class="form-control" name="Item[category_id]">
            <?= \app\components\widgets\TreeMenuWidget::widget(['tpl' => 'select_product', 'model' => $model])?>
        </select>
    </div>

    <?= $form->field($model, 'size')->textInput() ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <?= $form->field($model, 'unit_id')->textInput() ?>

    <?= $form->field($model, 'article')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_id')->label(false)->hiddenInput() ?>

    <?= $form->field($model, 'add_info')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'status')->dropDownList([
        $model::STATUS_ACTIVE => Yii::t('app', 'Active'),
        $model::STATUS_INACTIVE => Yii::t('app', 'Inactive'),
    ])
    ?>

    <?= $form->field($model, 'stock_limit')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
