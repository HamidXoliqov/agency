<?php

namespace app\modules\subsidy\models;

use Yii;

/**
 * This is the model class for table "subsidy_type".
 *
 * @property int $id
 * @property string|null $name_uz
 * @property string|null $name_ru
 * @property string|null $name_en
 *
 * @property AppealProtocolSubsidyType[] $appealProtocolSubsidyTypes
 */
class SubsidyType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subsidy_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'name_ru', 'name_en'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * Gets query for [[AppealProtocolSubsidyTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAppealProtocolSubsidyTypes()
    {
        return $this->hasMany(AppealProtocolSubsidyType::className(), ['subsidy_type_id' => 'id']);
    }
}
