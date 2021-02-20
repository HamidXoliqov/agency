<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SearchEmployee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tin') ?>

    <?= $form->field($model, 'ns10Code') ?>

    <?= $form->field($model, 'ns10Name') ?>

    <?= $form->field($model, 'ns11Code') ?>

    <?php // echo $form->field($model, 'ns11Name') ?>

    <?php // echo $form->field($model, 'fullName') ?>

    <?php // echo $form->field($model, 'birthDate') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'sexName') ?>

    <?php // echo $form->field($model, 'passSeries') ?>

    <?php // echo $form->field($model, 'passNumber') ?>

    <?php // echo $form->field($model, 'passDate') ?>

    <?php // echo $form->field($model, 'passOrg') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'zipCode') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'ns13Code') ?>

    <?php // echo $form->field($model, 'ns13Name') ?>

    <?php // echo $form->field($model, 'tinDate') ?>

    <?php // echo $form->field($model, 'dateModify') ?>

    <?php // echo $form->field($model, 'isitd') ?>

    <?php // echo $form->field($model, 'duty')->checkbox() ?>

    <?php // echo $form->field($model, 'personalNum') ?>

    <?php // echo $form->field($model, 'docCode') ?>

    <?php // echo $form->field($model, 'docName') ?>

    <?php // echo $form->field($model, 'isNotary') ?>

    <?php // echo $form->field($model, 'department_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
