<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Users */
/* @var $userDepartment app\modules\admin\models\UserDepartment */

$this->title = Yii::t('app', 'Update Users: {name}', [
    'name' => $model->fullname,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
    <?= $this->render('_form', [
        'model' => $model,
        'userDepartment' => $userDepartment,
        'password' => true
    ]) ?>


<?php
$js = <<< JS
    $('.modal-title').html('{$this->title}');
JS;
$this->registerJs($js)
?>