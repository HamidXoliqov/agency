<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\subsidy\models\Appeal */

$this->title = Yii::t('app', 'Update Appeal: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appeals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<?= $this->render('_form', [
    'model' => $model,
    'contr_agent' => $contr_agent,
]) ?>
