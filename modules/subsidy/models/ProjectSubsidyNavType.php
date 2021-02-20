<?php

namespace app\modules\subsidy\models;

use app\modules\manuals\models\NavType;
use Yii;

/**
 * This is the model class for table "project_subsidy_nav_type".
 *
 * @property int $id
 * @property int $project_subsidy_id
 * @property int $nav_type_id
 * @property float|null $area_ga
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property NavType $navType
 * @property ProjectSubsidy $projectSubsidy
 */
class ProjectSubsidyNavType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_subsidy_nav_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_subsidy_id', 'nav_type_id'], 'required'],
            [['project_subsidy_id', 'nav_type_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['project_subsidy_id', 'nav_type_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['area_ga'], 'number'],
            [['nav_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => NavType::className(), 'targetAttribute' => ['nav_type_id' => 'id']],
            [['project_subsidy_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectSubsidy::className(), 'targetAttribute' => ['project_subsidy_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'project_subsidy_id' => Yii::t('app', 'Project Subsidy ID'),
            'nav_type_id' => Yii::t('app', 'Nav Type ID'),
            'area_ga' => Yii::t('app', 'Area Ga'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[NavType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNavType()
    {
        return $this->hasOne(NavType::className(), ['id' => 'nav_type_id']);
    }

    /**
     * Gets query for [[ProjectSubsidy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectSubsidy()
    {
        return $this->hasOne(ProjectSubsidy::className(), ['id' => 'project_subsidy_id']);
    }
}
