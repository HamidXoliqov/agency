<?php


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Users */
/* @var $models app\modules\admin\models\AuthAssignment */
/** @var $userDepartment app\modules\admin\models\UserDepartment */

$this->title = Yii::t('app', 'Create user');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
        'models' =>$models,
        'userDepartment' => $userDepartment,
        'password' => false
    ]) ?>


<?php
$js = <<< JS
    $('.modal-title').html('{$this->title}');
JS;
$this->registerJs($js)
?>