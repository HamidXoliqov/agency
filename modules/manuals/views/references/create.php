<?php

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\References */
/* @var $references_type_id */
$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'References'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
    'references_type_id' => $references_type_id
]) ?>


