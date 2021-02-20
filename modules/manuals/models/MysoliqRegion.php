<?php

namespace app\modules\manuals\models;

use Yii;

/**
 * This is the model class for table "mysoliq_region".
 *
 * @property int $id
 * @property int|null $code
 * @property string|null $name_uz
 * @property string|null $name_ru
 */
class MysoliqRegion extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mysoliq_region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'default', 'value' => null],
            [['code'], 'integer'],
            [['name_uz', 'name_ru'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'name_uz' => Yii::t('app', 'Name Uz'),
            'name_ru' => Yii::t('app', 'Name Ru'),
        ];
    }

    public static function getRegion($code)
    {
        return self::findOne(['code' => $code])->name_uz;
    }
}
