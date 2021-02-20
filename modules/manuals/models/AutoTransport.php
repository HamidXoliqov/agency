<?php

namespace app\modules\manuals\models;

use Yii;

/**
 * This is the model class for table "auto_transport".
 *
 * @property int $id
 * @property string|null $name_uz
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property string|null $car_number
 * @property string|null $car_tel
 * @property int|null $status
 * @property int|null $type
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_by
 * @property int|null $updated_at
 */
class AutoTransport extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auto_transport';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'type', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'default', 'value' => null],
            [['status', 'type', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['name_uz', 'name_ru', 'name_en', 'car_number', 'car_tel'], 'string', 'max' => 255],
            [['name_uz', 'name_ru', 'name_en', 'car_number'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_uz' => Yii::t('app', 'Name Uz'),
            'name_ru' => Yii::t('app', 'Name Ru'),
            'name_en' => Yii::t('app', 'Name En'),
            'car_number' => Yii::t('app', 'Car Number'),
            'car_tel' => Yii::t('app', 'Car Tel'),
            'status' => Yii::t('app', 'Status'),
            'type' => Yii::t('app', 'Type'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
