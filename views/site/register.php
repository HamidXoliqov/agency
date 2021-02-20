<?php
/**
 * @var $model
 */

use himiklab\yii2\recaptcha\ReCaptcha2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

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
                            <!--                            <p class="opacity-40">-->
                            <?php //echo mb_strtoupper($info->content); ?><!--</p>-->
                        </div>
                        <?php $form = ActiveForm::begin([
                            'id' => $model->formName(),
                            'method' => 'post',
                            'enableAjaxValidation' => true,
                            'validationUrl' => Url::to(['site/validate-register'])
                        ]) ?>
                        <div class="pb-5">
                            <?= $form->field($model, 'username', [
                                'labelOptions' => ['class' => 'font-size-h6 font-weight-bolder text-dark'],
                                'inputOptions' => ['class' => 'form-control h-auto py-4 px-6 border-0 rounded-lg font-size-h6']
                            ])->textInput(['placeholder' => Yii::t('app', 'Username')])->label(false) ?>

                            <?= $form->field($model, 'full_name', [
                                'labelOptions' => ['class' => 'font-size-h6 font-weight-bolder text-dark'],
                                'inputOptions' => ['class' => 'form-control h-auto py-4 px-6 border-0 rounded-lg font-size-h6']
                            ])->textInput(['placeholder' => Yii::t('app', 'Full Name')])->label(false) ?>

                            <?= $form->field($model, 'email', [
                                'labelOptions' => ['class' => 'font-size-h6 font-weight-bolder text-dark'],
                                'inputOptions' => ['class' => 'form-control h-auto py-4 px-6 border-0 rounded-lg font-size-h6']
                            ])->textInput(['placeholder' => Yii::t('app', 'Email')])->label(false) ?>


                            <?= $form->field($model, 'password', [
                                'labelOptions' => ['class' => 'font-size-h6 font-weight-bolder text-dark'],
                                'inputOptions' => ['class' => 'form-control h-auto py-4 px-6 border-0 rounded-lg font-size-h6']
                            ])->textInput(['placeholder' => Yii::t('app', 'Password')])->label(false) ?>

                            <?= $form->field($model, 'confirm', [
                                'labelOptions' => ['class' => 'font-size-h6 font-weight-bolder text-dark'],
                                'inputOptions' => ['class' => 'form-control h-auto py-4 px-6 border-0 rounded-lg font-size-h6']
                            ])->textInput(['placeholder' => Yii::t('app', 'Confirm Password')])->label(false) ?>

                            <?= $form->field($model, 'inn', [
                                'labelOptions' => ['class' => 'font-size-h6 font-weight-bolder text-dark'],
                                'inputOptions' => ['class' => 'form-control h-auto py-4 px-6 border-0 rounded-lg font-size-h6']
                            ])->textInput(['placeholder' => Yii::t('app', 'INN')])->label(false) ?>

                            <?= $form->field($model, 'address', [
                                'labelOptions' => ['class' => 'font-size-h6 font-weight-bolder text-dark'],
                                'inputOptions' => ['class' => 'form-control h-auto py-4 px-6 border-0 rounded-lg font-size-h6']
                            ])->textInput(['placeholder' => Yii::t('app', 'Address')])->label(false) ?>
                            <?= $form->field($model, 'reCaptcha', [
                                'labelOptions' => ['class' => 'font-size-h6 font-weight-bolder text-dark'],
                                'inputOptions' => ['class' => 'form-control h-auto py-4 px-6 border-0 rounded-lg font-size-h6']
                            ])->widget(
                                ReCaptcha2::class,
                                [
                                    'siteKey' => '6Lfh6gkaAAAAAE1gvIduc66pfaVtMv-_9lHtFXI-',
                                ]
                            )->label(false) ?>

                            <?= Html::submitButton(Yii::t('app', 'Регистрация'), ['id' => '', 'class' => 'btn btn-success font-weight-bold px-18   py-3 my-5 mx-3']) ?>
                            <?= Html::a(Yii::t('app', 'Вход с помощью ЭЦП'), '#', ['id' => '', 'class' => 'coming-soon btn btn-primary font-weight-bold px-10   py-3 my-5 mx-3']) ?>
                            <?= Html::a(Yii::t('app', 'Sign in'), Url::to(['site/login']), ['id' => '', 'class' => 'btn btn-info font-weight-bold px-18 py-3 my-5 mx-3']) ?>
                        </div>
                        <?php ActiveForm::end() ?>
                    </div>
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
$this->registerCss("
.login-form.login-form-signup {
    width:500px;
}");
?>