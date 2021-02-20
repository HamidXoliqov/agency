<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\AppealStatus */

$this->title = Yii::t('app', 'Create Appeal Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appeal Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
