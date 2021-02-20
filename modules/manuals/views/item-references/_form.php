<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\manuals\models\ItemReferences */
/* @var $form yii\widgets\ActiveForm */
/* @var $father */
?>

    <div class="item-references-form">

        <?php $form = ActiveForm::begin([
            'id' => $model->formName(),
            'method' => 'post',
        ]); ?>

        <?= $form->field($model, 'id')->hiddenInput(['maxlength' => true])->label(false)?>

        <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'token')->textInput(['maxlength' => true]) ?>
        <span class="offcanvas user_info"
              style="color: red"><?= Yii::t('app', 'This username has already been taken.') ?>
        </span>

        <?= $form->field($model, 'sort')->input('number',[]) ?>

        <?php
        if (!empty($father)) {
            echo $form->field($model, 'parent_id')->hiddenInput(['value' => $father])->label(false);
        }
        ?>
        <?= $form->field($model, 'status')->dropDownList([
            $model::STATUS_ACTIVE => Yii::t('app', 'Active'),
            $model::STATUS_INACTIVE => Yii::t('app', 'Inactive'),
        ]) ?>


        <div class="form-group">
            <?= Html::submitButton('<i class="la la-save"></i>'.Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-outline-primary save_username']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?php
$url_cheack_token = Url::to(['check-username']);
$js = <<<JS
    $('.modal-title').html('{$this->title}');
    $('body').delegate('#itemreferences-token', 'blur', function() {
        let  token = $(this).val();
        let id = $('#itemreferences-id').val();
        if (token.length > 0){
            $.ajax({
                url:'{$url_cheack_token}',
                type: 'GET',
                data:{token:token,id:id},
                success : function(response) {
                    console.log(response);
                  if (!response.status){
                      $('.save_username').prop('disabled',true);
                      $('.user_info').removeClass('offcanvas');
                  }else{
                      $('.save_username').prop('disabled',false);
                       $('.user_info').addClass('offcanvas');
                  }
                }
                
            });
        }else{
             $('.user_info').addClass('offcanvas');
             $('.save_username').prop('disabled',false);
        }
    });
    
    
JS;
$this->registerJs($js);
