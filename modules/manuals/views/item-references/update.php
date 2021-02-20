<?php


/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\ItemReferences */
/* @var $father */
$this->title = Yii::t('app', 'Update Item References: {name}', [
    'name' => $model->token,
]);
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>


    <?= $this->render('_form', [
        'model' => $model,
        'father' =>$father
    ]) ?>

