<?php

namespace app\modules\subsidy\models;

use app\modules\admin\models\Users;
use app\modules\manuals\models\AppealStatus;
use Yii;

/**
 * This is the model class for table "status_timeline".
 *
 * @property int $id
 * @property int|null $appeal_id
 * @property int $action_time
 * @property string|null $comment
 * @property int $status
 * @property int $type
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $status_at
 * @property int|null $status_by
 *
 * @property Appeal $appeal
 * @property Users $user
 * @property AppealStatus $appealStatus
 * @property Users $statusBy
 */
class StatusTimeline extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status_timeline';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['appeal_id', 'action_time', 'status', 'type', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['appeal_id', 'action_time', 'status', 'type', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['action_time', 'status', 'type'], 'required'],
            [['comment'], 'string'],
            [['appeal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Appeal::className(), 'targetAttribute' => ['appeal_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app-msg', 'ID'),
            'appeal_id' => Yii::t('app-msg', 'Appeal ID'),
            'action_time' => Yii::t('app-msg', 'Action Time'),
            'comment' => Yii::t('app-msg', 'Comment'),
            'status' => Yii::t('app-msg', 'Status'),
            'type' => Yii::t('app-msg', 'Type'),
            'created_at' => Yii::t('app-msg', 'Created At'),
            'updated_at' => Yii::t('app-msg', 'Updated At'),
            'created_by' => Yii::t('app-msg', 'Created By'),
            'updated_by' => Yii::t('app-msg', 'Updated By'),
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
     * Gets query for [[Appeal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAppeal()
    {
        return $this->hasOne(Appeal::className(), ['id' => 'appeal_id']);
    }

    /**
     * Gets query for [[AppealStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAppealStatus()
    {
        return $this->hasOne(AppealStatus::className(), ['id' => 'status']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatusBy()
    {
        if($this->status_by == null)
            return null;
        return $this->hasOne(Users::className(), ['id' => 'status_by']);
    }
}
