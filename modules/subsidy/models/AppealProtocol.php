<?php

namespace app\modules\subsidy\models;

use Yii;

/**
 * This is the model class for table "appeal_protocol".
 *
 * @property int $id
 * @property int $appeal_id
 * @property int $subsidy_protocol_id
 * @property float|null $total_sum
 * @property float|null $self_sum
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 *
 * @property Appeal $appeal
 * @property SubsidyProtocol $subsidyProtocol
 * @property AppealProtocolSubsidyType[] $appealProtocolSubsidyTypes
 */
class AppealProtocol extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appeal_protocol';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['appeal_id', 'subsidy_protocol_id'], 'required'],
            [['appeal_id', 'subsidy_protocol_id', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'default', 'value' => null],
            [['appeal_id', 'subsidy_protocol_id', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['total_sum', 'self_sum'], 'number'],
            [['appeal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Appeal::className(), 'targetAttribute' => ['appeal_id' => 'id']],
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
            'appeal_id' => Yii::t('app', 'Appeal ID'),
            'subsidy_protocol_id' => Yii::t('app', 'Subsidy Protocol ID'),
            'total_sum' => Yii::t('app', 'Total Sum'),
            'self_sum' => Yii::t('app', 'Self Sum'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
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
     * Gets query for [[SubsidyProtocol]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubsidyProtocol()
    {
        return $this->hasOne(SubsidyProtocol::className(), ['id' => 'subsidy_protocol_id']);
    }

    /**
     * Gets query for [[AppealProtocolSubsidyTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAppealProtocolSubsidyTypes()
    {
        return $this->hasMany(AppealProtocolSubsidyType::className(), ['appeal_protocol_id' => 'id']);
    }
}
