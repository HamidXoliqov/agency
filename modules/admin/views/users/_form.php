<?php

use app\modules\admin\models\UserDepartment;
use yii\helpers\Html;
use kartik\select2\Select2;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Users */
/* @var $userDepartment UserDepartment */
/* @var $form yii\widgets\ActiveForm */
/* @var $models */
/* @var $password */
?>

<?php $form = ActiveForm::begin([
    'id' => $model->formName(),
    'method' => 'post',
    'enableAjaxValidation' => true,
//         'validationUrl' => Url::toRoute('users/validate'),
]); ?>

<?= $form->field($model, 'id')->hiddenInput(['maxlength' => true, 'id' => 'id'])->label(false) ?>
<?= $form->field($model, 'employee_id')->widget(Select2::classname(), [
    'data' => $model::getEmployeeList(),
    'size' => Select2::SIZE_SMALL,
    'options' => [
        'placeholder' => Yii::t('app', 'Select'),
    ],
    'pluginOptions' => [
        'allowClear' => true,
        // 'multiple' => true,
    ],
])->label(Yii::t('app', 'Select Employee for this user')); ?>
<?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

<label for=""><?= Yii::t('app', 'Username') ?></label>
<div class="username spinner-sm spinner-success spinner-right spinner-input">
    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'id' => 'username'])->label(false) ?>
</div>

<span class="offcanvas user_info"
      style="color: red"><?= Yii::t('app', 'This username has already been taken.') ?></span>

<?php
if ($password == true) {
    ?>
    <br>
    <a href=# class="change_password" style="color: #0a73bb"><?= Yii::t('app', 'Change password'); ?></a><br>
    <label for="new_password" class="offcanvas label_pasword"><?= Yii::t('app', 'New password'); ?></label>
    <input type="password" id="new_password" class="offcanvas form-control" name="new_password"><br>

    <?php
} else { ?>
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

<?php } ?>
<?= $form->field($model, 'card_number')->textInput() ?>
<?= $form->field($model, 'email')->textInput(['id' => 'email', 'type' => 'email']) ?>
<span class="offcanvas user_email" style="color: red"><?= Yii::t('app', 'This email has already been taken.'); ?></span>


<?= $form->field($model, 'item_name')->widget(Select2::classname(), [
    'data' => $model::getAssignment(),
    'size' => Select2::SIZE_SMALL,
    'options' => [
        'placeholder' => Yii::t('app', 'Select'),
    ],
    'pluginOptions' => [
        'allowClear' => true,
        'multiple' => true,
    ],
])->label(Yii::t('app', 'Select Roles for this user')); ?>
<?= $form->field($model, 'status')->dropDownList([
    $model::STATUS_ACTIVE => Yii::t('app', 'Active'),
    $model::STATUS_INACTIVE => Yii::t('app', 'Inactive'),
]); ?>
<br>
<h4><?= Yii::t('app', 'Permission to warehouses') ?></h4>
<hr>

<?= $form->field($userDepartment, 'department_receiving')->widget(Select2::classname(), [
    'data' => UserDepartment::getDepartmentName(),
    'size' => Select2::SIZE_SMALL,
    'options' => [
        'placeholder' => Yii::t('app', 'Select'),
        'multiple' => true,
    ],
    'pluginOptions' => [
        'allowClear' => true,
        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
    ],
])->label(Yii::t('app', 'Department receiving')); ?>

<?= $form->field($userDepartment, 'department_outputting')->widget(Select2::classname(), [
    'data' => UserDepartment::getDepartmentName(),
    'size' => Select2::SIZE_SMALL,
    'options' => [
        'placeholder' => Yii::t('app', 'Select'),
        'multiple' => true,
    ],
    'pluginOptions' => [
        'allowClear' => true,
        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
    ],
])->label(Yii::t('app', 'Department outputting')); ?>


<?= Html::submitButton("<i class='la la-save'></i> " . Yii::t('app', 'Save'),
    ['class' => 'btn btn-sm btn-outline-primary save_username']) ?>
<?php ActiveForm::end(); ?>
<br>

<?php
$url = Url::to(['username']);
$url1 = Url::to(['email']);
$url2 = Url::to(['fullname']);
$url_cheack_username = Url::to(['cheack-username']);
$js = <<< JS
    $('.modal-title').html('{$this->title}');
    email();
    
    $('body').delegate('#username', 'blur', function() {
        var  username = $(this).val();
        var id = $('#id').val();
        if (username.length >=4){
            $('.username').addClass('spinner');
            $.ajax({
                url:'{$url_cheack_username}',
                type: 'GET',
                data:{username:username,id:id},
                success : function(response) {
                  if (!response.status){
                      $('.username').removeClass('spinner');
                      $('.save_username').prop('disabled',true);
                      $('.user_info').removeClass('offcanvas');
                      email();
                  }else{
                      $('.username').removeClass('spinner');
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
    function email(){
     $('#email').on('blur',function() {
              var  email = $(this).val(); 
              var  id = $('#id').val();
              if (email.length > 0){
                  $.ajax({
                        url:'{$url1}',
                        type: 'GET',
                        data:{email:email,id:id},
                        success : function(response) {
                          if (response.status){
                              $('.save_username').prop('disabled',true);                                
                              $('.user_email').removeClass('offcanvas');
                          }else{
                               $('.save_username').prop('disabled',false);
                               $('.user_email').addClass('offcanvas');
                          }
                        }
                        
                    })
              }else{
                  $('.user_email').addClass('offcanvas');
                  $('.save_username').prop('disabled',false);
              }
                    
            });
    }
    
    $('body').delegate('.change_password', 'click', function(e) {
        e.preventDefault();
        $('#new_password').removeClass('offcanvas');
        $('.label_pasword').removeClass('offcanvas');
    })
    
JS;
$this->registerJs($js);

$css = <<<CSS
    .select2-container--krajee .select2-selection--multiple .select2-selection__choice{
       background-color: #0a73bb;
       color: white;
    }
CSS;
$this->registerCss($css)
?>

