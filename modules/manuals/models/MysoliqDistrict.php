<?php

namespace app\modules\manuals\models;

use Yii;

/**
 * This is the model class for table "mysoliq_district".
 *
 * @property int $id
 * @property int|null $code
 * @property int|null $region_code
 * @property string|null $name_uz
 * @property string|null $name_ru
 */
class MysoliqDistrict extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mysoliq_district';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'region_code'], 'default', 'value' => null],
            [['code', 'region_code'], 'integer'],
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
            'region_code' => Yii::t('app', 'Region Code'),
            'name_uz' => Yii::t('app', 'Name Uz'),
            'name_ru' => Yii::t('app', 'Name Ru'),
        ];
    }

    public static function getDistrict($code, $region_code)
    {
        return self::findOne(['code' => $code, 'region_code'=>$region_code])->name_uz;
    }
}
