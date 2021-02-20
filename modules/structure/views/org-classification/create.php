<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\structure\models\OrgClassification */

$this->title = Yii::t('app', 'Create Org Classification');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Org Classifications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="org-classification-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
