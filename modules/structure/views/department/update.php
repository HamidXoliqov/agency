<?php

/* @var $this yii\web\View */
/* @var $model app\modules\structure\models\Department */
/* @var $form */
if ($form == '_form'){
    $name = 'Update Department';
} elseif ($form == '_form-address'){
    $name = 'Update Address';
} elseif ($form == '_form-bank-account'){
    $name = 'Update Bank Account';
} elseif ($form == '_form-vat'){
    $name = 'Update Vat';
} else {
    $name = 'Update';
}
$this->title = Yii::t('app', $name);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Departments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="department-update">
    <?= $this->render('forms/' . (string)$form, [
        'model' => $model,
    ]) ?>
</div>

<?php
$js = <<< JS
    if ('$form' == '_form') {
        $('.modal-title').html('{$this->title}');
    } else {
        $('.modal-title1').html('{$this->title}');
    }
JS;
$this->registerJs($js)
?>