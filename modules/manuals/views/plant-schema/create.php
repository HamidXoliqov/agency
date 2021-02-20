<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\PlantSchema */

$this->title = Yii::t('app', 'Create Plan Schema');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Plan Schemas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
