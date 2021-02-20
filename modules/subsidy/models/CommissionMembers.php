<?php

namespace app\modules\subsidy\models;

use Yii;

/**
 * This is the model class for table "commission_members".
 *
 * @property int $id
 * @property int $subsidy_protocol_id
 * @property string|null $org_inn
 * @property string|null $fullname
 * @property string|null $org_name
 * @property string|null $email
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 *
 * @property SubsidyProtocol $subsidyProtocol
 */
class CommissionMembers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'commission_members';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subsidy_protocol_id'], 'required'],
            [['subsidy_protocol_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'default', 'value' => null],
            [['subsidy_protocol_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['org_inn'], 'string', 'max' => 20],
            [['fullname', 'org_name'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 100],
            [['subsidy_protocol_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubsidyProtocol::className(), 'targetAttribute' => ['subsidy_protocol_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'subsidy_protocol_id' => Yii::t('app', 'Subsidy Protocol ID'),
            'org_inn' => Yii::t('app', 'Org Inn'),
            'fullname' => Yii::t('app', 'Fullname'),
            'org_name' => Yii::t('app', 'Org Name'),
            'email' => Yii::t('app', 'Email'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->created_at = time();
            $this->updated_at = time();
            $this->created_by = Yii::$app->user->getId();
            $this->updated_by = Yii::$app->user->getId();
        }
        return parent::beforeSave($insert);
    }
    /**
     * Gets query for [[SubsidyProtocol]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubsidyProtocol()
    {
        return $this->hasOne(SubsidyProtocol::className(), ['id' => 'subsidy_protocol_id']);
    }
}
