<?php

namespace app\modules\structure\models;

use app\models\BaseModel;
use app\modules\manuals\models\Regions;
use Yii;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "dep_address".
 *
 * @property int $id
 * @property int|null $physical_region
 * @property string|null $physical_location
 * @property int|null $legal_region
 * @property string|null $legal_location
 * @property string|null $tel
 * @property string|null $email
 * @property int|null $department_id
 * @property int|null $status
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Department $department
 * @property Regions $physicalRegion
 * @property Regions $legalRegion
 */
class DepAddress extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dep_address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['physical_region', 'legal_region', 'department_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['physical_region', 'legal_region', 'department_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['physical_location', 'legal_location', 'tel', 'email'], 'string', 'max' => 255],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['physical_region'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::className(), 'targetAttribute' => ['physical_region' => 'id']],
            [['legal_region'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::className(), 'targetAttribute' => ['legal_region' => 'id']],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'physical_region' => Yii::t('app', 'Select Physical Region'),
            'physical_location' => Yii::t('app', 'Physical Location'),
            'legal_region' => Yii::t('app', 'Select Legal Region'),
            'legal_location' => Yii::t('app', 'Legal Location'),
            'tel' => Yii::t('app', 'Tel'),
            'email' => Yii::t('app', 'Email'),
            'department_id' => Yii::t('app', 'Department'),
            'status' => Yii::t('app', 'Status'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return yii\db\ActiveQuery
     */
    public function getDepartment(): ActiveQuery
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }

    /**
     * @return yii\db\ActiveQuery
     */
    public function getPhysicalRegion(): ActiveQuery
    {
        return $this->hasOne(Regions::className(), ['id' => 'physical_region']);
    }

    /**
     * @return yii\db\ActiveQuery
     */
    public function getLegalRegion(): ActiveQuery
    {
        return $this->hasOne(Regions::className(), ['id' => 'legal_region']);
    }

    public static function getAddressItems($id)
    {
        return self::find()->where(['department_id' => $id])->asArray()->all();
    }

    public static function getRegionsItems($parent_id = null, $lvl = 0): array
    {
        $regions = Regions::find()->where(['parent_id' => $parent_id])->all();//->andWhere(['status'=> self::STATUS_ACTIVE])
        $regions_tree = [];
        $probel = "";
        for ($i = 0; $i < $lvl; $i++) {
            $probel .= "-";
        }
        $lvl++;
        foreach ($regions as $region) {
            $regions_tree[$region['id']] = $probel . $region['name_' . Yii::$app->language];
            $regions_tree = ArrayHelper::merge($regions_tree, self::getRegionsItems($region['id'], $lvl));
        }
        return $regions_tree;
    }

}
