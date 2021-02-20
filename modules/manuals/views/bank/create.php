<?php

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\Bank */

$this->title = Yii::t('app', 'Create bank');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Banks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>

