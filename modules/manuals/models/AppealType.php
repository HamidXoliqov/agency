<?php

namespace app\modules\manuals\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "appeal_type".
 *
 * @property int $id
 * @property string|null $name_uz
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class AppealType extends \yii\db\ActiveRecord
{
    ///Subsidiya
    const TYPE_SUBSIDY = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appeal_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'default', 'value' => null],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
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
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->created_at = time();
            $this->updated_at = time();
            $this->created_by = Yii::$app->user->getId();
            $this->updated_by = Yii::$app->user->getId();
        }
        return parent::beforeSave($insert);
    }

    public static function getTypeList()
    {
        return ArrayHelper::map(AppealType::find()->orderBy(['id'=>SORT_ASC])->asArray()->all(), 'id', 'name_'.Yii::$app->language);
    }

}
