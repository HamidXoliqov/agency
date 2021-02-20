<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\UserDepartment */

$this->title = Yii::t('app', 'Create user department ');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Departments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
        'model' => $model,
    ]);


