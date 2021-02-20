<?php

namespace app\modules\subsidy\models;

use Yii;

/**
 * This is the model class for table "appeal_protocol_subsidy_type".
 *
 * @property int $id
 * @property int $appeal_protocol_id
 * @property int $subsidy_type_id
 * @property float|null $sum
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 *
 * @property AppealProtocol $appealProtocol
 * @property SubsidyType $subsidyType
 */
class AppealProtocolSubsidyType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appeal_protocol_subsidy_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['appeal_protocol_id', 'subsidy_type_id'], 'required'],
            [['appeal_protocol_id', 'subsidy_type_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'default', 'value' => null],
            [['appeal_protocol_id', 'subsidy_type_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['sum'], 'number'],
            [['appeal_protocol_id'], 'exist', 'skipOnError' => true, 'targetClass' => AppealProtocol::className(), 'targetAttribute' => ['appeal_protocol_id' => 'id']],
            [['subsidy_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubsidyType::className(), 'targetAttribute' => ['subsidy_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'appeal_protocol_id' => Yii::t('app', 'Appeal Protocol ID'),
            'subsidy_type_id' => Yii::t('app', 'Subsidy Type ID'),
            'sum' => Yii::t('app', 'Sum'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[AppealProtocol]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAppealProtocol()
    {
        return $this->hasOne(AppealProtocol::className(), ['id' => 'appeal_protocol_id']);
    }

    /**
     * Gets query for [[SubsidyType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubsidyType()
    {
        return $this->hasOne(SubsidyType::className(), ['id' => 'subsidy_type_id']);
    }
}
