<?php

use app\models\BaseModel;
use app\modules\manuals\models\Regions;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\project\models\Project3Point */
/* @var $form yii\widgets\ActiveForm */

$viloyatlar = ArrayHelper::map(Regions::find()->where(['status' => BaseModel::STATUS_ACTIVE])->andWhere(['parent_id' => null])->asArray()->all() ,'id', 'name_'.Yii::$app->language);
$tumanlar = Regions::find()->where(['status' => BaseModel::STATUS_ACTIVE])->andWhere(['>', 'parent_id', 0])->asArray()->all();
$tumanlarSelect = [];
foreach ($tumanlar as $tuman) {
    $tumanlarSelect[$viloyatlar[$tuman['parent_id']]][$tuman['id']] = $tuman['name_'.Yii::$app->language];
}
?>
<div class="card-body">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'project_id')->hiddenInput(['value' => $project_id])->label(false) ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'region_id')->dropDownList($viloyatlar) ?>
            <?= $form->field($model, 'address1')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'district_id')->dropDownList($tumanlarSelect) ?>
            <?= $form->field($model, 'address2')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
