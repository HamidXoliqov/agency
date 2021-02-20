<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->hiddenInput(['value' => '1'])->label(false); ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

    <?= Html::submitButton('<i class="la la-save"></i>'.Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-outline-primary']) ?>
<?php ActiveForm::end(); ?>

<?php
$js = <<<JS
    $('.modal-title').html('{$this->title}');
JS;
$this->registerJs($js);
?>
