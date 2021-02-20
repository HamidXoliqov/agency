<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\License */

$this->title = Yii::t('app', 'Update license: Order number({order_number})Serial number({serial_number})', [
    $til = "name_uz".Yii::$app->language,
    'order_number' => $model->order_number,
    'serial_number' => $model->serial_number,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Licenses'), 'url' => ['index']];

$this->params['breadcrumbs'][] = Yii::t('app', 'Update license');
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

<?php
if (!empty($dep)){
$js = <<< JS
    let id = '{$dep}';
    if (id.length > 0) {
        $('#kt_tree_1').hide();
        $('.back-department').attr('href', '/structure/department/index');
    }
JS;
$this->registerJs($js);
}
?>
