<?php

namespace app\modules\project\models;

use Yii;

/**
 * This is the model class for table "project_22_26_point".
 *
 * @property int $id
 * @property float|null $forecast_attracting_finance 22
 * @property float|null $involved_fact 24
 * @property float|null $forecast_period 25
 * @property float|null $forecast_year 26
 * @property int|null $project_id
 * @property int|null $order_number
 *
 * @property Project $project
 */
class Project2226Point extends \app\models\BaseModel
{
    public function behaviors(){
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_22_26_point';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['forecast_attracting_finance', 'involved_fact', 'forecast_period', 'forecast_year'], 'number'],
            [['project_id', 'order_number'], 'default', 'value' => null],
            [['project_id', 'order_number'], 'integer'],
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
            'forecast_attracting_finance' => Yii::t('app', 'Forecast Attracting Finance'),
            'involved_fact' => Yii::t('app', 'Involved Fact'),
            'forecast_period' => Yii::t('app', 'Forecast Period'),
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
