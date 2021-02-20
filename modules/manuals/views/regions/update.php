<?php

/**
 * @var $model app\modules\manuals\models\Regions
 */

$this->title = Yii::t('app', 'Update Regions: {name}', [
    'name' => $model['name_'.Yii::$app->language],
]);

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Regions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
