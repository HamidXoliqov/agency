<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\subsidy\models\SubsidyProtocol */

$this->title = Yii::t('app', 'Create Subsidy Protocol');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Subsidy Protocols'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subsidy-protocol-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    <?php
//echo Yii::$app->controller->renderPartial('_modal_form', []);
    ?>