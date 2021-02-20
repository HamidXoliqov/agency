<?php

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\License */

$this->title = Yii::t('app', 'Create License');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Licenses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
<?php
$js = <<< JS
if (id.length > 0) {
    $('#kt_tree_1').hide();
    $('.back-department').attr('href', '/structure/department/index');
}
JS;
$this->registerJs($js);
?>

