<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class RegisterContragent extends Model
{
    public $full_name;
    public $username;
    public $password;
    public $inn;
    public $email;
    public $login;
    public $confirm;
    public $address;
    public $body;
    public $verifyCode;
    public $reCaptcha;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['confirm', 'compare', 'compareAttribute'=> 'password', 'message' => Yii::t('app', "Passwords don't match")],
            [['username', 'full_name','email', 'password'], 'required'],
            ['email', 'email'],
            [['inn','email','login','password','confirm','address','username'],'string'],
//            ['verifyCode', 'captcha'],
            ['username', 'unique', 'targetClass' => 'app\modules\admin\models\Users', 'message' => Yii::t('app', 'This username has already been taken.')],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => Yii::t('app', 'Verification Code'),
            'full_name' => Yii::t('app', 'Full name'),
            'username' => Yii::t('app', 'Username'),
            'inn' => Yii::t('app', 'Inn'),
            'login' => Yii::t('app', 'Login'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'confirm' => Yii::t('app', 'Confirm Password'),
            'address' => Yii::t('app', 'Address'),
            'body' => Yii::t('app', 'Body'),
            'reCaptcha' => Yii::t('app', 'reCaptcha'),
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setReplyTo([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        }
        return false;
    }
}
