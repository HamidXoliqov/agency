<?php

namespace app\modules\structure\models;

use app\modules\manuals\models\References;
use Yii;
use yii\helpers\ArrayHelper;
use app\modules\manuals\models\Bank;

/**
 * This is the model class for table "dep_bank_account".
 *
 * @property int $id
 * @property string|null $bank_account
 * @property int|null $bank
 * @property int|null $account_type
 * @property int|null $department_id
 * @property int|null $status
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Bank $bank0
 * @property Department $department
 * @property References $accountType
 */
class DepBankAccount extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dep_bank_account';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bank', 'account_type', 'department_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['bank', 'account_type', 'department_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['bank_account'], 'string', 'max' => 255],
            [['bank'], 'exist', 'skipOnError' => true, 'targetClass' => Bank::className(), 'targetAttribute' => ['bank' => 'id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['account_type'], 'exist', 'skipOnError' => true, 'targetClass' => References::className(), 'targetAttribute' => ['account_type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'bank_account' => Yii::t('app', 'Bank Account'),
            'bank' => Yii::t('app', 'Select a Bank'),
            'account_type' => Yii::t('app', 'Select an Account Type'),
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
    public function getBank0()
    {
        return $this->hasOne(Bank::className(), ['id' => 'bank']);
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
    public function getAccountType()
    {
        return $this->hasOne(References::className(), ['id' => 'account_type']);
    }

    public static function getBankAccountItems($dep_id = null)
    {
        $lang = Yii::$app->language;
        $sql = '
                select
                    dep_bank_account.id,
                    r.name_'.$lang.' as account_type,
                    dep_bank_account.bank_account,
                    b.name_'.$lang.' as bank,
                    b.mfo,
                    b.inn,
                    b.address,
                    dep_bank_account.status
                from dep_bank_account
                left join "references" r on r.id = dep_bank_account.account_type
                left join bank b on dep_bank_account.bank = b.id';
        if (is_numeric($dep_id) == 1){
            $sql .= ' where dep_bank_account.department_id = '.$dep_id;
        }
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public static function getBankItems()
    {
        return ArrayHelper::map(Bank::find()->asArray()->all(), 'id', 'name_'.Yii::$app->language);
    }

    public static function getAccountTypeItems()
    {
        return ArrayHelper::map(References::find()->where(['references_type_id' => 3])->asArray()->all(), 'id', 'name_'.Yii::$app->language);
    }
}
