<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\structure\models\Department */
/* @var $form */
if ($form == '_form'){
    $this->title = Yii::t('app', 'Create Department');
} elseif ($form == '_form-address'){
    $this->title = Yii::t('app', 'Create Address');
} elseif ($form == '_form-bank-account'){
    $this->title = Yii::t('app', 'Create Bank Account');
} elseif ($form == '_form-vat'){
    $this->title = Yii::t('app', 'Create Vat');
}
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Departments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-create">
    <?= $this->render('forms/'.(string)$form, [
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