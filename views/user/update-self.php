<?php

use app\modules\admin\models\UserDepartment;
use app\modules\manuals\models\Contragent;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $employee app\modules\manuals\models\Contragent */
/* @var $form yii\widgets\ActiveForm */
/* @var $type_id */
?>
<div class="card card-custom example example-compact" style="background-color: rgb(250,250,250);">
    <div class="container-fluid mt-5">
        <?php
        $form = ActiveForm::begin([
            'id' => $employee->id,
            'method' => 'post',
    //            'enableAjaxValidation' => true,
    //            'validationUrl' =>Url::toRoute('contragent/validate'),
        ]); ?>
        <div class="row">
            <div class="col-lg-3 form-group">
                <div class="form-group">
                    <?= $form->field($employee, 'tin')->textInput(['maxlength' => true,'disabled'=>true])->label(Yii::t('app', 'Inn')) ?>
                </div>
            </div>
            <div class="col-lg-9">
                <?= $form->field($employee, 'fullName')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
            <!-- <div class="col-lg-3"> -->
                <!--<div class="form-group">
                    <label><?php /*echo Yii::t('app', 'Region')*/?></label>
                    <div class="input-group">
                        <label id="contragent-region" class="form-control"><?php /*echo $employee::getRegion($employee->district_id)['fullname']*/?></label>
                    </div>
                </div>-->
            <!-- </div> -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($employee, 'address')->textInput(['maxlength' => true]) ?>
            </div>
            <!-- <div class="col-md-12">
            </div> -->
        </div>
        <div class="row">
            <div class="col-md-6">
                
                <?= $form->field($employee, 'birthDate')->textInput(['disabled'=>true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($employee, 'sex', ['options' => ['class' => '']])->hiddenInput(['disabled'=>true])->label(false) ?>
                <?= $form->field($employee, 'sexName')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-3">
                        <?= $form->field($employee, 'passSeries')->textInput(['maxlength' => true,'disabled'=>true]) ?>
                    </div>
                    <div class="col-9">
                        <?= $form->field($employee, 'passNumber')->textInput(['disabled'=>true]) ?>                
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <?= $form->field($employee, 'passDate')->textInput(['disabled'=>true]) ?>                
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($employee, 'docName')->textInput(['maxlength' => true,'disabled'=>true]) ?>
                <?= $form->field($employee, 'docCode', ['options' => ['class' => '']])->hiddenInput(['disabled'=>true])->label(false) ?>
            </div>
            <div class="col-md-8">
                <?= $form->field($employee, 'passOrg')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($employee, 'ns10Code', ['options' => ['class' => '']])->hiddenInput()->label(false) ?>
                <?= $form->field($employee, 'ns10Name')->textInput(['maxlength' => true,])->label(Yii::t('app', 'Region ID')) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($employee, 'ns11Code', ['options' => ['class' => '']])->hiddenInput()->label(false) ?>
                <?= $form->field($employee, 'ns11Name')->textInput(['maxlength' => true,])->label(Yii::t('app', 'District ID')) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($employee, 'isitd', ['options' => ['class' => '']])->hiddenInput(['disabled'=>true])->label(false) ?>
                <?= $form->field($employee, 'isNotary', ['options' => ['class' => '']])->hiddenInput(['disabled'=>true])->label(false) ?>
                <?= $form->field($employee, 'personalNum')->textInput(['disabled'=>true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($employee, 'zipCode')->textInput(['disabled'=>true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($employee, 'ns13Code', ['options' => ['class' => '']])->hiddenInput(['disabled'=>true])->label(false) ?>
                <?= $form->field($employee, 'ns13Name')->textInput(['maxlength' => true,'disabled'=>true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($employee, 'tinDate')->textInput(['disabled'=>true]) ?>

                <?= $form->field($employee, 'dateModify', ['options' => ['class' => '']])->hiddenInput(['disabled'=>true])->label(false) ?>
                <?= $form->field($employee, 'tin', ['options' => ['class' => '']])->hiddenInput(['disabled'=>true])->label(false) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            	<label class="control-label" for="duty_list"><?=Yii::t('app', 'Duty')?></label><br>
                <div id="duty_list" class="btn btn-sm btn-<?=($employee->duty == 'true') ? 'danger' : 'success'?>"><?=($employee->duty == 'true') ? Yii::t('app', 'Debtor') : Yii::t('app', 'Not In Debt')?></div>
            </div>
            <div class="col-md-4">
                <?= $form->field($employee, 'phone')->widget(MaskedInput::className(),['mask' => '\+\9\9\8\(99\) 999 99 99'])?>
            </div>
            <div class="col-md-6">
            	<label class="control-label" for="popover_list">
            		<?=Yii::t('app', 'Select Department for this Employee')?>
            	</label>
                <input class="form-control bg-light" id="popover_list" data-container="body" data-toggle="popover" data-placement="top" readonly="readonly" data-content="<?=$department?>" class="hover-td" value="<?=$employee->department->short_name?>">
                                        
            </div>
        </div>
        <br><hr><br>
        <div class="row">
        	<div class="col-md-6">
				<?= $form->field($user, 'username')->textInput(['maxlength' => true, 'readonly' =>true, 'id' => 'username']) ?>
			</div>
        	<div class="col-md-6">
				<?= $form->field($user, 'email')->textInput(['id' => 'email', 'type' => 'email']) ?>
			</div>
        </div>
        <div class="row">
        	<div class="col-12 change_password">
		    	<div class="form-group">
		    	<a href=# class="change_password" style="color: #0a73bb"><?= Yii::t('app', 'Change password'); ?></a>
		    	</div>
        	</div>
        	<div class="col-md-6">
	        	
		    	<?= $form->field($user, 'password')->passwordInput(['maxlength' => true, 'id' => 'new_password', 'disabled' => true, 'class' => 'offcanvas form-control'])->label(false) ?>
        	</div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('<i class="la la-save"></i>'.Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-outline-primary']) ?>
            <?= Html::a('<i class="la la-step-backward"></i>'.Yii::t('app', 'Back'), ['mypage'], ['class' => 'btn btn-sm btn-outline-info']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
<?php
$url = Url::to(['username']);
$url1 = Url::to(['email']);
$url2 = Url::to(['fullname']);
$url_cheack_username = Url::to(['cheack-username']);
$js = <<<JS
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
        $('.change_password').addClass('toggle');
        $('#new_password').removeClass('offcanvas');
        $('#new_password').prop("disabled", false);
    });
    $('body').delegate('.toggle', 'click', function(e) {
        e.preventDefault();
        $('.change_password').removeClass('toggle');
        $('#new_password').addClass('offcanvas');
        $('#new_password').prop("disabled", true);
    })
JS;
$this->registerJs($js);

$css = <<<CSS
.popover{
    max-width: 75%; /* Max Width of the popover (depending on the container!) */
    font-size: 14px;
}
CSS;
$this->registerCss($css);
?>
