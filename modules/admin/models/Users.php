<?php

namespace app\modules\admin\models;

use app\components\PermissionHelper;
use app\models\BaseModel;
use app\modules\structure\models\Department;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property int $hr_employee_id
 * @property string $fullname
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $address
 * @property string $img
 * @property string $in
 * @property string $out
 * @property int $status [smallint]
 * @property int $department_id [integer]
 * @property string $created_by [integer]
 * @property string $updated_by [integer]
 * @property string $created_at [integer]
 * @property string $updated_at [integer]
 * @property string $card_number [varchar(255)]
 * @property string $inn [varchar(25)]
 * @property string $cert_key [varchar(50)]
 * @property string $cert_key_id [varchar(100)]
 * @property string $cert_serial [varchar(20)]
 * @property string $pkcs7 [text]
 *
 * @property Department $department
 */
class Users extends BaseModel implements IdentityInterface
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    public $item_name;
    public $check_password;
    public $new_password;

    public $in;
    public $out;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['email'], 'email'],
            [['status', 'created_at', 'created_by', 'updated_at', 'updated_by', 'department_id', 'employee_id'], 'integer'],
            [['fullname', 'cert_key_id'], 'string', 'max' => 100],
            [['cert_key'], 'string', 'max' => 50],
            [['cert_serial'], 'string', 'max' => 20],
            [['inn'], 'string', 'max' => 25],
            [['address','card_number','pkcs7'], 'string'],
            [['username', 'password', 'new_password', 'email'], 'string', 'length' => [4, 60]],
            [['username', 'email', 'inn'], 'unique'],
            [['username'], 'unique', 'on' => [self::SCENARIO_UPDATE], 'filter' => function ($query) {
                $query->andWhere(['!=', 'id', $this->id]);
            }],
            [['email'], 'unique', 'on' => [self::SCENARIO_UPDATE], 'filter' => function ($query) {
                $query->andWhere(['!=', 'id', $this->id]);
            }],
        ];
    }


    public function afterFind()
    {
        $id = $this->id;
        $itemName = AuthAssignment::find()->where(['user_id' => $id])->asArray()->all();
        $this->item_name = ArrayHelper::getColumn($itemName, 'item_name');
        return parent::afterFind();
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'hr_employee_id' => Yii::t('app', 'Hr Employee Id'),
            'fullname' => Yii::t('app', 'Full name'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'email' => Yii::t('app', 'Email'),
            'address' => Yii::t('app', 'Address'),
            'img' => Yii::t('app', 'Image'),
            'in' => Yii::t('app', 'In'),
            'out' => Yii::t('app', 'Out'),
            'status' => Yii::t('app', 'Status'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'card_number' => Yii::t('app', 'Card number'),
            'inn' => Yii::t('app', 'Inn'),
        ];
    }

    /**
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserDepartment()
    {
        return $this->hasOne(UserDepartment::className(), ['user_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getDep(){
        return Department::find()
            ->select(['name_'.Yii::$app->language, 'id'])
            ->where(['status'=>Department::STATUS_ACTIVE])
            ->indexBy('id')
            ->column();

    }

    /**
     * @return string|null
     */
    public function getUserRoles()
    {

        $depIds = self::find()
            ->select(['id'])
            ->where(['id' => $this->id])
            ->asArray()
            ->all();

        if (!empty($depIds)) {

            $allIds = ArrayHelper::getColumn($depIds, 'id');
            $departmentNames = AuthAssignment::find()
                ->select(['item_name'])
                ->where(['in', 'user_id', $allIds])
                ->asArray()
                ->all();
            $res = '';

            foreach ($departmentNames as $name) {
                $res .= "<h6 class='badge badge-success' style='padding-bottom: 7px;'>{$name['item_name']}</h6>" . " ";
            }

            return $res;
        }
        return null;
    }

    /**
     * @return array
     */
    public static function getEmployeeList()
    {
        $model = Employee::find()->where(['status' => BaseModel::STATUS_ACTIVE])->all();
        return ArrayHelper::map($model, 'id', 'fullName');
    }

    /**
     * @return array
     */
    public static function getAssignment()
    {
        $model = AuthItem::find()->where(['type' => 1])->all();
        return ArrayHelper::map($model, 'name', 'name');
    }

    ////////////////////////////////////
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    public static function findByUsername($username)
    {
//        return self::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
        $user =  self::findOne(['username' => $username]);
        if($user != null) {
            if($user->status != Users::STATUS_INACTIVE && $user->status != Users::STATUS_DELETED)
                return $user;
        }
        return null;
    }

    public static function findByEsikey($inn,$key)
    {
        return self::findOne(['inn' => $inn, 'cert_key' => $key, 'status' => self::STATUS_ACTIVE, 'can_in' => 1]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDepartmentId()
    {
        return $this->department_id;
    }

    public function getAuthKey()
    {
        //  return $this->authKey;
    }


    public function validateAuthKey($authKey)
    {
        //  return $this->authKey === $authKey;
    }


    public function setPassword($password)
    {
        $this->password = Yii::$app->getSecurity()->generatePasswordHash($password);
    }

    public function setPasswordReturn($password)
    {
        return Yii::$app->getSecurity()->generatePasswordHash($password);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public static function getUsernameById($id)
    {
        return self::findOne($id);
    }

    public function isSuperAdmin() {
        return PermissionHelper::can('auth-item/index') && PermissionHelper::can('auth-item/update');
    }

    public function isContragent() {
//        return PermissionHelper::can('appeal/create') && PermissionHelper::can('appeal/update');
        return $this->department_id != null && $this->department_id != 1;
    }

    const AGENCY_INN = '306147706';
    public function isAgency() {
        return true;
//        return PermissionHelper::can('appeal/index')
//            && PermissionHelper::can('appeal/view')
//            && PermissionHelper::can('appeal/update');
        if($this->inn == Users::AGENCY_INN || $this->cert_serial==Users::AGENCY_INN) {
            return true;
        }
        return false;
//        return $this->department_id == 1;
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


}
