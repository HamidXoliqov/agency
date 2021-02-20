<?php

namespace app\modules\manuals\models;

use app\modules\warehouse\models\Item;
use Yii;

/**
 * This is the model class for table "countries".
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name_en
 * @property string|null $name_ru
 * @property string|null $name_uz
 * @property int|null $status
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Item[] $items
 */
class Countries extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['code', 'name_en', 'name_ru', 'name_uz'], 'string', 'max' => 255],
            [['code', 'name_en', 'name_ru', 'name_uz'], 'required'],
            [['code'],'unique'],
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
            'name_en' => Yii::t('app', 'Name En'),
            'name_ru' => Yii::t('app', 'Name Ru'),
            'name_uz' => Yii::t('app', 'Name Uz'),
            'status' => Yii::t('app', 'Status'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Items]].
     *
     * @return yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::className(), ['country_id' => 'id']);
    }
}
