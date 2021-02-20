<?php

namespace app\modules\manuals\models;

use app\modules\subsidy\models\ProjectSubsidy;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "plant_schema".
 *
 * @property int $id
 * @property string|null $name_uz
 * @property string|null $name_ru
 * @property string|null $name_en
 *
 * @property ProjectSubsidy[] $projectSubsidies
 */
class PlantSchema extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plant_schema';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_by', 'updated_by', 'created_at', 'updated_at'], 'default', 'value' => null],
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
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[ProjectSubsidies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectSubsidies()
    {
        return $this->hasMany(ProjectSubsidy::className(), ['plant_schema_id' => 'id']);
    }

    public static function getTypeList()
    {
        return ArrayHelper::map(PlantSchema::find()->orderBy(['id'=>SORT_ASC])->asArray()->all(), 'id', 'name_'.Yii::$app->language);
    }
}
