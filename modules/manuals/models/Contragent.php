<?php

namespace app\modules\manuals\models;

use app\modules\structure\models\Department;
use Yii;
use app\models\BaseModel;
use yii\helpers\ArrayHelper;
use app\modules\structure\models\OrgClassification;

/**
 * This is the model class for table "contragent".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $short_name
 * @property string|null $add_info
 * @property string|null $address
 * @property string|null $director
 * @property string|null $tel
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 * @property string|null $distance
 * @property string|null $inn
 * @property string|null $vatcode
 * @property string|null $contact_info
 * @property string|null $oked
 * @property string|null $accounter
 * @property int|null $department_id
 * @property string|null $accounter_inn
 * @property string|null $accounter_tel
 * @property string|null $director_inn
 * @property int|null $region_id
 * @property int|null $district_id
 * @property string|null $bank
 * @property string|null $bank_code
 * @property string|null $bank_account_number
 * @property string|null $fund
 * @property string|null $reg_date
 * @property string|null $reg_num
 * @property int|null $nc1Code
 * @property string|null $nc1Name
 * @property string|null $nc2Name
 * @property int|null $nc2Code
 * @property int|null $nc3Code
 * @property string|null $nc3Name
 * @property string|null $nc4Name
 * @property int|null $nc4Code
 * @property int|null $nc5Code
 * @property string|null $nc5Name
 * @property string|null $nc6Name
 * @property int|null $nc6Code
 * @property int|null $ns1Code
 * @property string|null $ns1Name
 * @property int|null $ns3Code
 * @property string|null $ns3Name
 * @property int|null $ns4Code
 * @property string|null $ns4Name
 * @property int|null $ns13Code
 * @property string|null $ns13Name
 * @property int|null $na1Code
 * @property string|null $na1Name
 * @property int|null $stateCode
 * @property string|null $stateName
 *
 * @property Department $department
 * @property ContragentFiles[] $contragentFiles
 * @property Document[] $documents
 * @property Project2Point[] $project2Points
 */
class Contragent extends BaseModel
{
    public $ns10Name;
    public $ns11Name;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contragent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'created_at', 'created_by', 'updated_at', 'updated_by', 'nc1Code', 'nc2Code', 'nc3Code', 'nc4Code', 'nc5Code', 'nc6Code', 'ns1Code', 'ns3Code', 'ns4Code', 'ns13Code', 'na1Code', 'stateCode'], 'default', 'value' => null],
            [['status', 'created_at', 'created_by', 'updated_at', 'updated_by', 'department_id', 'region_id', 'district_id', 'nc1Code', 'nc2Code', 'nc3Code', 'nc4Code', 'nc5Code', 'nc6Code', 'ns1Code', 'ns3Code', 'ns4Code', 'ns13Code', 'na1Code', 'stateCode'], 'integer'],
            [['reg_date'], 'safe'],
            [['name', 'add_info', 'address', 'director', 'accounter', 'nc1Name', 'nc2Name', 'nc3Name', 'nc4Name', 'nc5Name', 'nc6Name', 'ns1Name', 'ns3Name', 'ns4Name', 'ns13Name', 'na1Name', 'stateName', 'short_name'], 'string',  'max' => 255],
            [['tel', 'accounter_tel', 'fund'], 'string', 'max' => 50],
            [['inn'], 'unique'],
            [['inn'], 'string', 'max' => 9],
            [['vatcode'], 'string', 'max' => 30],
            [['oked'], 'string', 'max' => 10],
            [['accounter_inn', 'director_inn'], 'string', 'max' => 15],
            [['bank'], 'string', 'max' => 150],
            [['bank_code', 'bank_account_number'], 'string', 'max' => 100],
            [['reg_num'], 'string', 'max' => 20],
            // [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Organization Fullname'),
            'short_name' => Yii::t('app', 'Short Name'),
            'add_info' => Yii::t('app', 'Add Info'),
            'address' => Yii::t('app', 'Address'),
            'director' => Yii::t('app', 'Director'),
            'tel' => Yii::t('app', 'Tel'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'inn' => Yii::t('app', 'Inn'),
            'vatcode' => Yii::t('app', 'НДС код'),
            'contact_info' => Yii::t('app', 'Контакт'),
            'oked' => Yii::t('app', 'ОКПО'),
            'accounter' => Yii::t('app', 'Accounter'),
            'department_id' => Yii::t('app', 'Department ID'),
            'accounter_inn' => Yii::t('app', 'Accounter Inn'),
            'accounter_tel' => Yii::t('app', 'Accounter Tel'),
            'director_inn' => Yii::t('app', 'Director Inn'),
            'region_id' => Yii::t('app', 'Region ID'),
            'district_id' => Yii::t('app', 'District ID'),
            'bank' => Yii::t('app', 'Bank'),
            'bank_code' => Yii::t('app', 'Bank Code'),
            'bank_account_number' => Yii::t('app', 'Bank Account Number'),
            'fund' => Yii::t('app', 'Fund'),
            'reg_date' => Yii::t('app', 'Reg Date'),
            'reg_num' => Yii::t('app', 'Reg Num'),
            'nc1Code' => Yii::t('app', 'Nc1 Code'),
            'nc1Name' => Yii::t('app', 'Nc1 Name'),
            'nc2Name' => Yii::t('app', 'Nc2 Name'),
            'nc2Code' => Yii::t('app', 'Nc2 Code'),
            'nc3Code' => Yii::t('app', 'Nc3 Code'),
            'nc3Name' => Yii::t('app', 'Nc3 Name'),
            'nc4Name' => Yii::t('app', 'Nc4 Name'),
            'nc4Code' => Yii::t('app', 'Nc4 Code'),
            'nc5Code' => Yii::t('app', 'Nc5 Code'),
            'nc5Name' => Yii::t('app', 'Nc5 Name'),
            'nc6Name' => Yii::t('app', 'Nc6 Name'),
            'nc6Code' => Yii::t('app', 'Nc6 Code'),
            'ns1Code' => Yii::t('app', 'Ns1 Code'),
            'ns1Name' => Yii::t('app', 'Ns1 Name'),
            'ns3Code' => Yii::t('app', 'Ns3 Code'),
            'ns3Name' => Yii::t('app', 'Ns3 Name'),
            'ns4Code' => Yii::t('app', 'Ns4 Code'),
            'ns4Name' => Yii::t('app', 'Ns4 Name'),
            'ns13Code' => Yii::t('app', 'Ns13 Code'),
            'ns13Name' => Yii::t('app', 'Ns13 Name'),
            'na1Code' => Yii::t('app', 'Na1 Code'),
            'na1Name' => Yii::t('app', 'Na1 Name'),
            'stateCode' => Yii::t('app', 'State Code'),
            'stateName' => Yii::t('app', 'State Name'),
        ];
    }

    /**
     * @param null $id
     * @return array|mixed
     */
    public static function getStatusForContr($id = null){
        $statusList = [
            self::STATUS_ACTIVE => Yii::t('app','Active'),
            self::STATUS_INACTIVE => Yii::t('app','Inactive'),
            self::STATUS_DELETED => Yii::t('app','Deleted'),
            self::STATUS_PENDING => Yii::t('app','Pending'),
        ];
        if(!empty($id) && array_key_exists($id, $statusList)) return $statusList[$id];
        return $statusList;
    }

    /**
     * Gets query for [[ReferencesType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReferencesType()
    {
        return $this->hasOne(References::className(), ['id' => 'references_type_id']);
    }

    /**
     * Gets query for [[Documents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Document::className(), ['contragent_id' => 'id']);
    }

    public static function getRegion($reg_id)
    {
        $row = (new \yii\db\Query())
            ->select(['id', 'fullname'])
            ->from('contragent_region')
            ->where(['id' => $reg_id])
            ->one();
        return $row;
    }

    public static function getContragentById($id)
    {
        if (empty($id)) return "";
        return self::find()->where(['id' => $id])->asArray()->limit(1)->one() ?? "";
    }




    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }

    /**
     * Gets query for [[ContragentFiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContragentFiles()
    {
        return $this->hasMany(ContragentFiles::className(), ['contragent_id' => 'id']);
    }

    /**
     * Gets query for [[Project2Points]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProject2Points()
    {
        return $this->hasMany(Project2Point::className(), ['contragent_id' => 'id']);
    }

    /**
     * @return yii\db\ActiveQuery
     */
    public function getOrgClassifications()
    {
        return $this->hasMany(ContragentOrgClassification::className(), ['contragent_id' => 'id']);
    }

    /**
     * @return array for select2
     */
    public static function getOrgClassificationId($parent_id = null, $lvl = 0) {
        $regions = OrgClassification::find()->where(['parent_id' => $parent_id])->andWhere(['status'=> self::STATUS_ACTIVE])->all();
        $regions_tree = [];
        $probel = "";
        for ($i = 1; $i <= $lvl; $i++){
            $probel = $i.'0';
        }
        $lvl++;
        foreach ($regions as $region)
        {
            if ($parent_id == null){
                $regions_tree[$region['id']] = '<b>'.$region['name_'.Yii::$app->language].'</b>';
            } else {
                $regions_tree[$region['id']] = "<div style='padding-left: ".$probel."px; padding-right: 10px;'>".$region['name_'.Yii::$app->language]."</div>";
            }
            $regions_tree = \yii\helpers\ArrayHelper::merge($regions_tree, self::getOrgClassificationId($region['id'], $lvl));
        }
        return $regions_tree;
    }

    /**
     * @return array for select2
     */
    public static function getOrgClassificationColor($parent_id = null, $lvl = 0) {
        $regions = OrgClassification::find()->where(['parent_id' => $parent_id])->andWhere(['status'=> self::STATUS_ACTIVE])->all();
        $regions_tree = [];
        $probel = [0=>'black',1=>'#552a2a',2=>'#b51a1a',3=>'#ff0000',4=>'#ff7500',5=>'#ffc000',6=>'#ffff00',7=>'#ddff77',8=>'#bbddbb',9=>'#5bc',10=>'#089'];
        for ($i = 0; $i < $lvl + 1; $i++){
            $color = $probel[$i];
        }
        $lvl++;
        foreach ($regions as $region)
        {
            if ($parent_id == null){
                $regions_tree[$region['id']] = $color;
            } else {
                $regions_tree[$region['id']] = $color;
            }
            $regions_tree = \yii\helpers\ArrayHelper::merge($regions_tree, self::getOrgClassificationColor($region['id'], $lvl));
        }
        return $regions_tree;
    }

    public static function getConteragentList()
    {
        return ArrayHelper::map(Contragent::find()->orderBy(['id'=>SORT_ASC])->asArray()->all(), 'id', 'director');
    }

}
