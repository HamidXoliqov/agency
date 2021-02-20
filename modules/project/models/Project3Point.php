<?php

namespace app\modules\project\models;

use app\modules\manuals\models\Regions;
use Yii;

/**
 * This is the model class for table "project_3_point".
 *
 * @property int $id
 * @property int|null $region_id
 * @property int|null $district_id
 * @property string|null $address1
 * @property string|null $address2
 * @property int|null $project_id
 * @property int|null $order_number
 *
 * @property Project $project
 * @property Regions $region
 */
class Project3Point extends \app\models\BaseModel
{
    public function behaviors(){
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_3_point';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_id', 'district_id', 'project_id', 'order_number'], 'default', 'value' => null],
            [['region_id', 'district_id', 'project_id', 'order_number'], 'integer'],
            [['address1', 'address2'], 'string', 'max' => 255],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'region_id' => Yii::t('app', 'Region ID'),
            'district_id' => Yii::t('app', 'District ID'),
            'address1' => Yii::t('app', 'Address1'),
            'address2' => Yii::t('app', 'Address2'),
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

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Regions::className(), ['id' => 'region_id']);
    }
}
