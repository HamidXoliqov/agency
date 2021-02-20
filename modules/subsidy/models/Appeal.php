<?php

namespace app\modules\subsidy\models;

use app\models\BaseModel;
use app\modules\admin\models\Users;
use app\modules\manuals\models\AppealStatus;
use app\modules\manuals\models\AppealType;
use app\modules\manuals\models\Contragent;
use xj\qrcode\QRcode;
use xj\qrcode\widgets\Text;

use Yii;

/**
 * This is the model class for table "appeal".
 *
 * @property int $id
 * @property int $contragent_id
 * @property int $appeal_status
 * @property int $appeal_type
 * @property int $status
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 * @property int|null $status_at
 * @property int|null $status_by
 * @property string $cert_key [varchar(50)]
 * @property string $cert_key_id [varchar(100)]
 * @property string $cert_serial [varchar(20)]
 * @property string $pkcs7 [text]
 * @property int|null $subsidy_protocol_id
 *
 * @property Contragent $contragent
 * @property AppealAttachment[] $appealAttachments
 * @property ProjectSubsidy[] $projectSubsidies
 * @property ProjectSubsidy $projectSubsidy
 * @property Users $updatedBy
 * @property Users $statusBy
 */
class Appeal extends BaseModel
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appeal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['contragent_id', 'appeal_status', 'appeal_type', 'status'], 'required'],
            [['cert_key_id'], 'string', 'max' => 100],
            [['cert_key'], 'string', 'max' => 50],
            [['cert_serial'], 'string', 'max' => 20],
            [['pkcs7'], 'string'],
            [['contragent_id', 'appeal_status', 'appeal_type', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by', 'status_at', 'status_by', 'subsidy_protocol_id'], 'default', 'value' => null],
            [['contragent_id', 'appeal_status', 'appeal_type', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by', 'status_at', 'status_by', 'subsidy_protocol_id'], 'integer'],
            [['contragent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contragent::className(), 'targetAttribute' => ['contragent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'contragent_id' => Yii::t('app', 'Contragent ID'),
            'appeal_status' => Yii::t('app', 'Appeal Status'),
            'appeal_type' => Yii::t('app', 'Appeal Type'),
            'status' => Yii::t('app', 'Status'),
            'status_by' => Yii::t('app', 'Status By'),
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
     * Gets query for [[Contragent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContragent()
    {
        return $this->hasOne(Contragent::className(), ['id' => 'contragent_id']);
    }

    /**
     * Gets query for [[AppealAttachments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAppealAttachments()
    {
        return $this->hasMany(AppealAttachment::className(), ['appeal_id' => 'id'])->orderBy(['type' => SORT_ASC]);
    }

    /**
     * Gets query for [[ProjectSubsidies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectSubsidies()
    {
        return $this->hasMany(ProjectSubsidy::className(), ['appeal_id' => 'id']);
    }

    /**
     * Gets query for [[ProjectSubsidy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectSubsidy()
    {
        return $this->hasOne(ProjectSubsidy::className(), ['appeal_id' => 'id']);
    }


    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        if($this->updated_by == null)
            return null;
        return $this->hasOne(Users::className(), ['id' => 'updated_by']);
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



    /* @return AppealStatus */
    public function getAppealStatus() {
        return AppealStatus::findOne(['id' => $this->appeal_status]);
    }

    /* @return AppealType */
    public function getAppealType() {
        return AppealType::findOne(['id' => $this->appeal_type]);
    }


    public static function getStatusOne($id)
    {
        return AppealStatus::find()->where(['id' => $id])->asArray()->one();
    }

    public static function getTypeOne($id)
    {
        return AppealType::find()->where(['id' => $id])->asArray()->one();
    }

    public static function getConteragentOne($id)
    {
        return Contragent::find()->where(['id' => $id])->asArray()->one();
    }

    public static function getQrCodeGenerator($code)
    {
        $data =  Text::widget([
            'outputDir' => '@webroot/uploads/qrcode',
            'outputDirWeb' => '@web/uploads/qrcode',
            'ecLevel' => QRcode::QR_ECLEVEL_L,
            'text' => 'status:1526 '.$code,
            'size' => 6,
        ]);
        return $data;
    }
}
