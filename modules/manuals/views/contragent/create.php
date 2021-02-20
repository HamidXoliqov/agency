<?php

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\Contragent */

$this->title = Yii::t('app', 'Create Contragent');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contragents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
        'modely' => $modely,
    ]) ?>


