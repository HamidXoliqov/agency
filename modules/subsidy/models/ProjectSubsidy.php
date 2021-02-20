<?php

namespace app\modules\subsidy\models;

use app\models\BaseModel;
use app\modules\manuals\models\Contragent;
use app\modules\manuals\models\PlantSchema;
use app\modules\manuals\models\References;
use app\modules\manuals\models\Regions;
use Yii;

/**
 * This is the model class for table "project_subsidy".
 *
 * @property int $id
 * @property int $appeal_id
 * @property int $contragent_id
 * @property int|null $region_id
 * @property int|null $district_id
 * @property int|null $contur_number
 * @property int|null $counter_ga
 * @property int|null $water_pump_count
 * @property int|null $bonitet_ball
 * @property float|null $plant_all_area_ga
 * @property string|null $plant_address
 * @property int $plant_schema_id
 * @property int|null $plant_all_count
 * @property string|null $end_date
 * @property int|null $job_count
 * @property float|null $project_all_price
 * @property int|null $project_all_price_currency_id
 * @property int $status_project
 * @property int $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property Appeal $appeal
 * @property Contragent $contragent
 * @property PlantSchema $plantSchema
 * @property References $projectAllPriceCurrency
 * @property Regions $region
 * @property Regions $district
 * @property ProjectSubsidyNavType[] $projectSubsidyNavTypes
 * @property ProjectSubsidySubWork[] $projectSubsidySubWorks
 * @property ProjectSubsidyWork[] $projectSubsidyWorks
 */
class ProjectSubsidy extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_subsidy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['appeal_id', 'contragent_id', 'status_project', 'status'], 'required'],
            [['appeal_id', 'contragent_id', 'region_id', 'district_id', 'contur_number', 'counter_ga', 'water_pump_count', 'bonitet_ball', 'plant_schema_id', 'plant_all_count', 'job_count', 'project_all_price_currency_id', 'status_project', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['appeal_id', 'contragent_id', 'region_id', 'district_id', 'contur_number', 'counter_ga', 'water_pump_count', 'bonitet_ball', 'plant_schema_id', 'plant_all_count', 'job_count', 'project_all_price_currency_id', 'status_project', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['plant_all_area_ga', 'project_all_price'], 'number'],
            [['end_date'], 'safe'],
            [['plant_address'], 'string', 'max' => 255],
            [['appeal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Appeal::className(), 'targetAttribute' => ['appeal_id' => 'id']],
            [['contragent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contragent::className(), 'targetAttribute' => ['contragent_id' => 'id']],
            [['plant_schema_id'], 'exist', 'skipOnError' => true, 'targetClass' => PlantSchema::className(), 'targetAttribute' => ['plant_schema_id' => 'id']],
            [['project_all_price_currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => References::className(), 'targetAttribute' => ['project_all_price_currency_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::className(), 'targetAttribute' => ['region_id' => 'id']],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::className(), 'targetAttribute' => ['district_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'appeal_id' => Yii::t('app', 'Appeal ID'),
            'contragent_id' => Yii::t('app', 'Contragent ID'),
            'region_id' => Yii::t('app', 'Region ID'),
            'district_id' => Yii::t('app', 'District ID'),
            'contur_number' => Yii::t('app', 'Contur Number'),
            'counter_ga' => Yii::t('app', 'Counter Ga'),
            'water_pump_count' => Yii::t('app', 'Water Pump Count'),
            'bonitet_ball' => Yii::t('app', 'Bonitet Ball'),
            'plant_all_area_ga' => Yii::t('app', 'Plant All Area Ga'),
            'plant_address' => Yii::t('app', 'Plant Address'),
            'plant_schema_id' => Yii::t('app', 'Plant Schema ID'),
            'plant_all_count' => Yii::t('app', 'Plant All Count'),
            'end_date' => Yii::t('app', 'End Date'),
            'job_count' => Yii::t('app', 'Job Count'),
            'project_all_price' => Yii::t('app', 'Project All Price'),
            'project_all_price_currency_id' => Yii::t('app', 'Project All Price Currency ID'),
            'status_project' => Yii::t('app', 'Status Project'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[Appeal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAppeal()
    {
        return $this->hasOne(Appeal::className(), ['id' => 'appeal_id']);
    }

    /**
     * Gets query for [[Contragent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContragent()
    {
        return $this->hasOne(Contragent::className(), ['id' => 'contragent_id']);
    }

    /**
     * Gets query for [[PlantSchema]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlantSchema()
    {
        return $this->hasOne(PlantSchema::className(), ['id' => 'plant_schema_id']);
    }


    public function getProjectAllPriceAsMillionSum() {
        $price = $this->project_all_price;
        $price = $price * 0.000001;
        return sprintf("%0.2f", $price);
    }

    /**
     * Gets query for [[ProjectAllPriceCurrency]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectAllPriceCurrency()
    {
        return $this->hasOne(References::className(), ['id' => 'project_all_price_currency_id']);
    }

    /**
     * Viloyatni aniqlash [[Region]].
     *
     * @return Regions
     */
    public function getTheRegion()
    {
        $region = $this->region;
        if($region->parent_id != null)
            $region = $region->parent;

        if($region->parent_id != null)
            $region = $region->parent;

        return $region;
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

    /**
     * Gets query for [[District]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(Regions::className(), ['id' => 'district_id']);
    }

    /**
     * Gets query for [[ProjectSubsidyNavTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectSubsidyNavTypes()
    {
        return $this->hasMany(ProjectSubsidyNavType::className(), ['project_subsidy_id' => 'id']);
    }

    /**
     * Gets query for [[ProjectSubsidySubWorks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectSubsidySubWorks()
    {
        return $this->hasMany(ProjectSubsidySubWork::className(), ['project_subsidy_id' => 'id']);
    }

    /**
     * Gets query for [[ProjectSubsidyWork]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectSubsidyWorks()
    {
        return $this->hasMany(ProjectSubsidyWork::className(), ['project_subsidy_id' => 'id'])->orderBy(['id' => SORT_ASC]);
    }

    public static function getPlantSchemaOne($id)
    {
        $lang = 'name_'.Yii::$app->language;
        return PlantSchema::findOne($id)->$lang;
    }
}
