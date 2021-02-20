<?php

use app\modules\admin\models\UserDepartment;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\UserDepartment */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin([
    'id' => $model->formName(),
]); ?>

<?= $form->field($model, 'user_id')->widget(Select2::classname(), [
    'data' => UserDepartment::getUserName(),
    'size' => Select2::SIZE_SMALL,
    'options' => ['placeholder' => Yii::t('app', 'Select')],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); ?>


<?= $form->field($model, 'department_receiving')->widget(Select2::classname(), [
    'data' => UserDepartment::getDepartmentName(),
    'size' => Select2::SIZE_SMALL,
    'options' => [
        'placeholder' => Yii::t('app', 'Select'),
        'multiple' => true,
    ],
    'pluginOptions' => [
        'allowClear' => true,
        'escapeMarkup' => new \yii\web\JsExpression('function (markup) { return markup; }'),
    ],
])->label(Yii::t('app', 'Department receiving')); ?>

<?= $form->field($model, 'department_outputting')->widget(Select2::classname(), [
    'data' => UserDepartment::getDepartmentName(),
    'size' => Select2::SIZE_SMALL,
    'options' => [
        'placeholder' => Yii::t('app', 'Select'),
        'multiple' => true,
    ],
    'pluginOptions' => [
        'allowClear' => true,
        'escapeMarkup' => new \yii\web\JsExpression('function (markup) { return markup; }'),
    ],
])->label(Yii::t('app', 'Department outputting')); ?>
<br>

<?= Html::submitButton('<i class="la la-save"></i>'.Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-outline-primary save']) ?>
<?php ActiveForm::end(); ?>


<?php
$js = <<< JS
    $('.modal-title').html('{$this->title}');
JS;
$this->registerJs($js);
?>

