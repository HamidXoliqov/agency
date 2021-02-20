<?php

namespace app\modules\admin\models;

use app\models\BaseModel;
use app\modules\structure\models\Department;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property int|null $tin
 * @property int|null $ns10Code
 * @property string|null $ns10Name
 * @property int|null $ns11Code
 * @property string|null $ns11Name
 * @property string|null $fullName
 * @property string|null $birthDate
 * @property int|null $sex
 * @property string|null $sexName
 * @property string|null $passSeries
 * @property int|null $passNumber
 * @property string|null $passDate
 * @property string|null $passOrg
 * @property int|null $phone
 * @property int|null $zipCode
 * @property string|null $address
 * @property int|null $ns13Code
 * @property string|null $ns13Name
 * @property string|null $tinDate
 * @property string|null $dateModify
 * @property int|null $isitd
 * @property bool|null $duty
 * @property int|null $personalNum
 * @property int|null $docCode
 * @property string|null $docName
 * @property int|null $isNotary
 * @property int|null $department_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $status
 *
 * @property Department $department
 * @property Users[] $users
 */
class Employee extends \app\models\BaseModel
{
    public $inn;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['department_id', 'ns10Name', 'ns11Name', 'sexName', 'passSeries', 'passDate', 'passOrg', 'tinDate', 'passNumber', 'ns13Name', 'personalNum', 'docName', 'address', 'fullName', 'birthDate', 'zipCode'], 'required'],
            [['tin', 'ns10Code', 'ns11Code', 'sex', 'passNumber', 'zipCode', 'ns13Code', 'isitd', 'personalNum', 'docCode', 'isNotary', 'department_id', 'created_at', 'updated_at', 'created_by', 'updated_by', 'status'], 'default', 'value' => null],
            [['tin', 'ns10Code', 'ns11Code', 'sex', 'passNumber', 'zipCode', 'ns13Code', 'isitd', 'personalNum', 'docCode', 'isNotary', 'department_id', 'created_at', 'updated_at', 'created_by', 'updated_by', 'status'], 'integer'],
            [['birthDate', 'passDate', 'tinDate', 'dateModify'], 'safe'],
            [['ns10Name', 'ns11Name', 'fullName', 'sexName', 'passSeries', 'passOrg', 'address', 'ns13Name', 'docName', 'phone', 'duty'], 'string', 'max' => 255],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tin' => Yii::t('app', 'Tin'),
            'ns10Code' => Yii::t('app', 'Ns10 Code'),
            'ns10Name' => Yii::t('app', 'Ns10 Name'),
            'ns11Code' => Yii::t('app', 'Ns11 Code'),
            'ns11Name' => Yii::t('app', 'Ns11 Name'),
            'fullName' => Yii::t('app', 'Full Name'),
            'birthDate' => Yii::t('app', 'Birth Date'),
            'sex' => Yii::t('app', 'Sex'),
            'sexName' => Yii::t('app', 'Sex Name'),
            'passSeries' => Yii::t('app', 'Pass Series'),
            'passNumber' => Yii::t('app', 'Pass Number'),
            'passDate' => Yii::t('app', 'Pass Date'),
            'passOrg' => Yii::t('app', 'Pass Org'),
            'phone' => Yii::t('app', 'Phone'),
            'zipCode' => Yii::t('app', 'Zip Code'),
            'address' => Yii::t('app', 'Address'),
            'ns13Code' => Yii::t('app', 'Ns13 Code'),
            'ns13Name' => Yii::t('app', 'Ns13 Name'),
            'tinDate' => Yii::t('app', 'Tin Date'),
            'dateModify' => Yii::t('app', 'Date Modify'),
            'isitd' => Yii::t('app', 'Isitd'),
            'duty' => Yii::t('app', 'Duty'),
            'personalNum' => Yii::t('app', 'Personal Num'),
            'docCode' => Yii::t('app', 'Doc Code'),
            'docName' => Yii::t('app', 'Doc Name'),
            'isNotary' => Yii::t('app', 'Is Notary'),
            'department_id' => Yii::t('app', 'Department ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'status' => Yii::t('app', 'Status'),
        ];
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
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['employee_id' => 'id']);
    }

    /**
     * @return array for select2
     */
    public static function getDepartmentList($parent_id = null, $lvl = 0) {
        $regions = Department::find()->where(['parent_id' => $parent_id])->andWhere(['status'=> self::STATUS_ACTIVE])->all();
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
            $regions_tree = \yii\helpers\ArrayHelper::merge($regions_tree, self::getDepartmentList($region['id'], $lvl));
        }
        return $regions_tree;
    }

}
