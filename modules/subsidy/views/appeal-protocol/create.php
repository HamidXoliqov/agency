<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\subsidy\models\AppealProtocol */

$this->title = Yii::t('app', 'Create Appeal Protocol');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appeal Protocols'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appeal-protocol-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
