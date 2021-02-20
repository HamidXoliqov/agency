<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "system_structura".
 *
 * @property int $id
 * @property string|null $img_login
 * @property string|null $img_header
 * @property string|null $title
 * @property string|null $content
 */
class SystemStructura extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_structura';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img_login', 'img_header', 'title', 'content'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'img_login' => Yii::t('app', 'Img Login'),
            'img_header' => Yii::t('app', 'Img Header'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
        ];
    }
}
