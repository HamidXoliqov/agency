<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\References */
/* @var $form yii\widgets\ActiveForm */
/* @var $references_type_id */

$this->title = Yii::t('app', 'Create');
?>

<?php $form = ActiveForm::begin([
    'id' => $model->formName(),
    'method' => 'post'
    ]); ?>
    <input type="text" name="references_type_id" class="hide" value="<?=$model->references_type_id?>">

<?= $form->field($model, 'name_uz')->textInput(['maxlength' => true, 'name' => 'name_uz']) ?>

<?= $form->field($model, 'name_en')->textInput(['maxlength' => true, 'name' => 'name_en']) ?>

<?= $form->field($model, 'name_ru')->textInput(['maxlength' => true, 'name' => 'name_ru']) ?>

<?= $form->field($model, 'token')->textInput(['maxlength' => true, 'name' => 'token']) ?>

<?= $form->field($model, 'sort')->textInput(['maxlength' => true, 'name' => 'sort']) ?>

<?= $form->field($model, 'status')->dropDownList([
    $model::STATUS_ACTIVE => Yii::t('app', 'Active'),
    $model::STATUS_INACTIVE => Yii::t('app', 'Inactive'),
], ['name' => 'status']); ?>
    <div class="offcanvas-footer">
        <?= Html::submitButton('<i class="la la-save"></i>'.Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-outline-primary references-create']) ?>
    </div>
<?php ActiveForm::end(); ?>
    <!--end::Form-->
<?php
$urlReferencesCreate = \yii\helpers\Url::to(['department/references-create-ajax']);
$js = <<<JS
    $('.modal-title').html('{$this->title}');
    
    $('.hide').hide();

    $( "#References" ).submit(function( event ) {
        event.preventDefault();
      
        let references_object = $( this ).serializeArray();
        let url = '{$urlReferencesCreate}';
        $.ajax({
            url: url,
            data:{obj: references_object},
            type:'GET',
            success: function(response){
                if(response.status){
                    if (response.type == 2) {
                        $("#department_type").append('<option value="' + response.id + '">' + response.val + '</option>');
                        $("#department_type").val(response.id);
                        $("#department_type").trigger('change');    
                    } else if (response.type == 1) {
                        $("#currency").append('<option value="' + response.id + '">' + response.val + '</option>');
                        $("#currency").val(response.id);
                        $("#currency").trigger('change'); 
                        $(".currency").append('<option value="' + response.id + '">' + response.val + '</option>');
                        $(".currency").trigger('change');
                    } else if (response.type == 3) {
                        $("#account_type").append('<option value="' + response.id + '">' + response.val + '</option>');
                        $("#account_type").val(response.id);
                        $("#account_type").trigger('change'); 
                    } else if (response.type == 9) {
                        $("#unit").append('<option value="' + response.id + '">' + response.val + '</option>');
                        $("#unit").val(response.id);
                        $("#unit").trigger('change'); 
                    } else if (response.type == 11) {   
                        $("#contragent").append('<option value="' + response.id + '">' + response.val + '</option>');
                        $("#contragent").val(response.id);
                        $("#contragent").trigger('change'); 
                    }
                    $('.close').click();
                }               
            }
        });
    });
JS;
$this->registerJs($js);

?>