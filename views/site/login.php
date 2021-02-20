<?php
/**
 * @var $model
 * @var $info
 * @var $errorMsg
 */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\web\View;

$this->title = Yii::t('app', "Мониторинг реализации инвестиционных проектов и исполнения государственных программ");
?>
    <div class="d-flex flex-column flex-root">
        <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
            <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat"
                 style="background-image: url('<?= Url::base(); ?>/asset/media/bg/bg-4.jpg');">
                <div class="login-form text-center p-7 position-relative overflow-hidden">
                    <div class="d-flex flex-center mb-15">
                        <a href="#">
                            <img src="<?= Url::base() ?>/asset/media/logos/logo-letter-1.png" class="max-h-75px"
                                 alt="<?= $info->img_login; ?>"/>
                        </a>
                    </div>
                    <div class="login-signin text-light">
                        <div class="mb-20">
                            <h2 class="font-weight-normal"><?= $info->title; ?></h2>
                            <!--                        <p class="opacity-40">-->
                            <?php //echo mb_strtoupper($info->content); ?><!--</p>-->
                        </div>
                        <?php if ($errorMsg) : ?>
                            <div class="alert">
                                <div class="alert  alert-custom alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
                                    <div class="alert-text"><?php echo $errorMsg; ?></div>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php $form = ActiveForm::begin([
                            'options' => [
                                'id' => 'kt_login_signin_form',
                                'class' => 'form',
                            ],
                        ]); ?>
                        <div class="form-group mb-5">
                            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form-control form-control-lg text-dark', 'autocomplete' => 'off', 'placeholder' => Yii::t('app', 'Username')])->label(false); ?>
                        </div>
                        <div class="form-group mb-5">
                            <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control form-control-lg text-dark', 'placeholder' => Yii::t('app', 'Password')])->label(false); ?>
                        </div>

                        <?= Html::submitButton(Yii::t('app', 'Sign in'), ['id' => '', 'class' => 'btn btn-success font-weight-bold px-18   py-3 my-5 mx-3', 'name' => 'login-button']) ?>
                        <?= Html::a(Yii::t('app', 'Вход с помощью ЭЦП'), Url::to(['site/via-esi']), ['id' => '', 'class' => 'btn btn-primary font-weight-bold px-10 py-3 my-5 mx-3', 'name' => 'login-button']) ?>
                        <?= Html::a(Yii::t('app', 'Регистрация'), Url::to(['site/esi']), ['id' => '', 'class' => 'btn btn-info font-weight-bold px-18 py-3 my-5 mx-3', 'name' => 'login-button']) ?>
                        <?= yii\authclient\widgets\AuthChoice::widget([
                            'baseAuthUrl' => ['site/auth'],
                            'popupMode' => false,
                        ]) ?>
                        <?php ActiveForm::end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php

$this->registerJsVar('messages', [
    'coming_soon' => Yii::t('app', "Скоро будет"),
    'successful' => Yii::t('app', "Successfully Registered"),
    'getStatus' => Yii::$app->request->get('status'),
]);
$js = <<<JS

if (messages.getStatus=='success') {
    Swal.fire(messages.successful, false, "success");
}

$(".coming-soon").click(function(e) {
    Swal.fire(messages.coming_soon, messages.coming_soon, "warning");
});
JS;
$this->registerJsFile("/js/sweetalert/sweetalert.js", ['depends' => "yii\bootstrap\BootstrapAsset"]);
$this->registerJs($js, View::POS_END);