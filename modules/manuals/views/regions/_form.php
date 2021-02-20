<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\modules\manuals\models\Regions */
?>

<?php $form = ActiveForm::begin([
    'id' => $model->formName(),
    'method' => 'post',
    'enableAjaxValidation' => true,
    'validationUrl' =>Url::toRoute('regions/validate'),
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