<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\AppealType */

$this->title = Yii::t('app', 'Create Appeal Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appeal Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
