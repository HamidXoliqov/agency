<?php

namespace app\modules\admin\models;

use app\models\BaseModel;
use app\modules\structure\models\Department;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user_department".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $department_id
 * @property int|null $is_transfer
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property Department $department
 * @property Users $user
 */
class UserDepartment extends BaseModel
{
    public  $department_receiving;
    public  $department_outputting;

    const  DEPARTMENT_RECEIVING = 1;
    const  DEPARTMENT_OUTPUTTING = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'department_id', 'is_transfer', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['user_id'],'required'],
            [['user_id', 'department_id', 'is_transfer', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }


    public function afterFind()
    {
        $id = $this->user_id;
        $departmentReceiving =  Department::find()
            ->leftJoin('user_department','user_department.department_id = department.id')
            ->where(['status' => self::STATUS_ACTIVE])
            ->andWhere(['user_department.is_transfer' => self::DEPARTMENT_RECEIVING])
            ->andWhere(['user_department.user_id'=>$id])
            ->asArray()
            ->all();
        $departmentOutputting =  Department::find()
            ->leftJoin('user_department','user_department.department_id = department.id')
            ->where(['status' => self::STATUS_ACTIVE])
            ->andWhere(['user_department.is_transfer' => self::DEPARTMENT_OUTPUTTING])
            ->andWhere(['user_department.user_id'=>$id])
            ->asArray()
            ->all();
        $this->department_outputting = ArrayHelper::getColumn($departmentOutputting,'id');
        $this->department_receiving = ArrayHelper::getColumn($departmentReceiving,'id');
        return parent::afterFind();
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User'),
            'department_id' => Yii::t('app', 'Department'),
            'is_transfer' => Yii::t('app', 'Is Transfer'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }

    /**
     * @return yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    public static function getUserName()
    {
        return Users::find()
                        ->select(['fullname', 'id'])
                        ->where(['status'=>Users::STATUS_ACTIVE])
                        ->indexBy('id')
                        ->column();
    }

    public static function getDepartmentName()
    {
        return Department::getHierarchy();
        $department = Department::find()->where(['status'=>self::STATUS_ACTIVE])->asArray()->all();

        return ArrayHelper::map($department, 'id', "name_" . Yii::$app->language);
    }
    public static function getDepartmentRec($user_id, $transfer_type)
    {
        $depIds = self::find()
            ->select(['department_id'])
            ->where(['user_id' => $user_id, 'is_transfer' => $transfer_type])
            ->asArray()
            ->all();

        if (!empty($depIds)) {

            $allIds = ArrayHelper::getColumn($depIds, 'department_id');
            $departmentNames = Department::find()
                ->select(["name_" . Yii::$app->language])
                ->where(['in', 'id', $allIds])
                ->andWhere(['status' => self::STATUS_ACTIVE])
                ->asArray()
                ->all();
            $res = '';

            foreach ($departmentNames as $name) {

                $res .= "<span class='p-1 badge ". ($transfer_type == UserDepartment::IS_TRANSFER_RESIVING ? "badge-warning" : "badge-primary") ." mb-1 ml-1'>{$name["name_".Yii::$app->language]}</span>";

            }

            return $res;
        }
        return null;
    }

    public static function receivingEmpty($user_id, $departmentId)
    {
        if (is_numeric($user_id) && is_numeric($departmentId)){
        return self::find()->where(['user_id' => $user_id, 'department_id' => $departmentId,
            'is_transfer' => self::DEPARTMENT_RECEIVING])->asArray()->all();
        }
    }

    public static function outgoingEmpty($user_id, $departmentId)
    {
        if (is_numeric($user_id) && is_numeric($departmentId)) {
            return self::find()->where(['user_id' => $user_id, 'department_id' => $departmentId,
                'is_transfer' => self::DEPARTMENT_OUTPUTTING])->asArray()->all();
        }
    }

    public function userDepartmentSave($data, $userId = null)
    {
        $isAllSaved = true;
        $user_id = isset($userId) ? $userId : $data['UserDepartment']['user_id']; //TODO: shu joyini tekshirish kerak
        if(!empty($data['UserDepartment']['department_receiving'])){
            foreach ($data['UserDepartment']['department_receiving'] as $departmentId){
                $modelLoop = new static();
                $modelLoop->setAttributes([
                    'user_id' => $user_id,
                    'department_id' => $departmentId,
                    'is_transfer' => self::DEPARTMENT_RECEIVING
                ]);
                if (empty(self::receivingEmpty($user_id, $departmentId))) {
                    if ($modelLoop->save()) {
                        $isAllSaved = true;
                        unset($modelLoop);
                    } else {
                        $isAllSaved = false;
                        break;
                    }
                }
            }
        }
        if(!empty($data['UserDepartment']['department_outputting'])){
            foreach ($data['UserDepartment']['department_outputting'] as $departmentId){
                $isAllSaved = false;
                $modelLoop = new  static();
                $modelLoop->setAttributes([
                    'user_id' => $user_id,
                    'department_id' => $departmentId,
                    'is_transfer' => self::DEPARTMENT_OUTPUTTING
                ]);
                if (empty(self::outgoingEmpty($user_id, $departmentId))) {
                    if ($modelLoop->save()) {
                        $isAllSaved = true;
                        unset($modelLoop);
                    } else {
                        $isAllSaved = false;
                        break;
                    }
                }
            }
        }

        return $isAllSaved;
    }


}
