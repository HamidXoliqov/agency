<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\NavType */

$this->title = Yii::t('app', 'Create Nav Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nav Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
