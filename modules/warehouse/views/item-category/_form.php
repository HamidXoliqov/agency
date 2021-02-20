<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\warehouse\models\ItemCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'id' => $model->formName(),
    'method' => 'post',
    'enableAjaxValidation' => true,
    'validationUrl' =>Url::toRoute('item-category/validate'),
]); ?>

<?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'parent_id')->label(false)->hiddenInput(['maxlength' => true]) ?>

<?= $form->field($model, 'status')->dropDownList([
    $model::STATUS_ACTIVE => Yii::t('app','Active'),
    $model::STATUS_INACTIVE => Yii::t('app','Inactive')
]) ?>

<?= Html::submitButton('<i class="la la-save"></i>'.Yii::t('app', 'Save'), ['class' => 'btn btn-outline-primary btn-sm']) ?>

<?php ActiveForm::end(); ?>


<?php
$js = <<< JS
    $('.modal-title3').html('{$this->title}');
JS;
$this->registerJs($js)
?>

<div class="item-category-form" style="display: none;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>

<!--    --><?php //echo $form->field($model, 'parent_id')->textInput() ?>

    <div class="form-group field-itemcategory-parent_id has-success">
        <label class="control-label" for="itemcategory-parent_id">Родительская категория</label>
        <select id="itemcategory-parent_id" class="form-control" name="ItemCategory[parent_id]">
            <option value="0">Самостоятельная категория</option>
            <?= \app\components\widgets\TreeMenuWidget::widget(['tpl' => 'select', 'model' => $model])?>
        </select>
    </div>

    <?=
    $form->field($model, 'status')->dropDownList([
        $model::STATUS_ACTIVE => Yii::t('app', 'Active'),
        $model::STATUS_INACTIVE => Yii::t('app', 'Inactive'),
    ])
    ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
