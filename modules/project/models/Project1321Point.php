<?php

namespace app\modules\project\models;

use Yii;

/**
 * This is the model class for table "project_13_21_point".
 *
 * @property int $id
 * @property string|null $assimilation_forecast_year 13
 * @property string|null $assimilation_forecast 14
 * @property string|null $mastered_fact 15
 * @property float|null $cmr Promotion of international development - 16
 * @property float|null $equipment 17
 * @property float|null $import 18
 * @property float|null $other 19
 * @property float|null $predict_period =15/14 - n% - 20
 * @property float|null $forecast_year =15/13 - n% - 21
 * @property int|null $project_id
 * @property int|null $order_number
 *
 * @property Project $project
 */
class Project1321Point extends \app\models\BaseModel
{
    public function behaviors(){
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_13_21_point';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cmr', 'equipment', 'import', 'other', 'predict_period', 'forecast_year'], 'number'],
            [['project_id', 'order_number'], 'default', 'value' => null],
            [['project_id', 'order_number'], 'integer'],
            [['assimilation_forecast_year', 'assimilation_forecast', 'mastered_fact'], 'string', 'max' => 255],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'assimilation_forecast_year' => Yii::t('app', 'Assimilation Forecast Year'),
            'assimilation_forecast' => Yii::t('app', 'Assimilation Forecast'),
            'mastered_fact' => Yii::t('app', 'Mastered Fact'),
            'cmr' => Yii::t('app', 'Cmr'),
            'equipment' => Yii::t('app', 'Equipment'),
            'import' => Yii::t('app', 'Import'),
            'other' => Yii::t('app', 'Other'),
            'predict_period' => Yii::t('app', 'Predict Period'),
            'forecast_year' => Yii::t('app', 'Forecast Year'),
            'project_id' => Yii::t('app', 'Project ID'),
            'order_number' => Yii::t('app', 'Order Number'),
        ];
    }

    /**
     * Gets query for [[Project]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }
}
