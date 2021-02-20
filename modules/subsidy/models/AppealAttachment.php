<?php

namespace app\modules\subsidy\models;

use app\models\Attachment;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "appeal_attachment".
 *
 * @property int $id
 * @property int $appeal_id
 * @property int|null $attachment_id
 * @property int $type
 *
 * @property Appeal $appeal
 * @property Attachment $attachment
 */
class AppealAttachment extends ActiveRecord
{
    //1.	Лойиҳа тўғрисида маълумот
    const TYPE_INFORMATION_ABOUT_PROJECT = 1;

    //2.	Ер ажратиш тўғрисида туман ҳокимининг қарори ва харитаси нусхаси
    const TYPE_DECISION_AND_MAP_OF_THE_DISTRICT_GOVERNOR_ON_LAND_ALLOCATION = 2;

    //3.	Ер участкасига бўлган ижара шартномаси нусхаси
    const TYPE_LEASE_AGREEMENT_FOR_LAND_PLOT = 3;

    //4.	Ер балл бонитет бўйича кадастр маълумотномаси нусхаси
    const TYPE_CADASTRAL_REFERENCE_ON_LAND_SCORE_QUALITY = 4;



    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appeal_attachment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['appeal_id', 'type'], 'required'],
            [['appeal_id', 'attachment_id', 'type'], 'default', 'value' => null],
            [['appeal_id', 'attachment_id', 'type'], 'integer'],
            [['appeal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Appeal::className(), 'targetAttribute' => ['appeal_id' => 'id']],
            [['attachment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attachment::className(), 'targetAttribute' => ['attachment_id' => 'id']],
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
            'attachment_id' => Yii::t('app-msg', 'Attachment ID'),
            'type' => Yii::t('app-msg', 'Type'),
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
     * Gets query for [[Attachment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAttachment()
    {
        return $this->hasOne(Attachment::className(), ['id' => 'attachment_id']);
    }

    public static function getAttachDocName($type) {
        switch ($type) {
            case AppealAttachment::TYPE_INFORMATION_ABOUT_PROJECT :
                return "Лойиҳа тўғрисида маълумот";
            case AppealAttachment::TYPE_DECISION_AND_MAP_OF_THE_DISTRICT_GOVERNOR_ON_LAND_ALLOCATION :
                return "Ер ажратиш тўғрисида туман ҳокимининг қарори ва харитаси нусхаси";
            case AppealAttachment::TYPE_LEASE_AGREEMENT_FOR_LAND_PLOT :
                return "Ер участкасига бўлган ижара шартномаси";
            case AppealAttachment::TYPE_CADASTRAL_REFERENCE_ON_LAND_SCORE_QUALITY :
                return "Ер балл бонитет бўйича кадастр маълумотномаси";
        }
        return "";
    }

    const doc_type = [
        '1' =>'Лойиҳа тўғрисида маълумот',
        '2' =>'Ер ажратиш тўғрисида туман ҳокимининг қарори ва харитаси нусхаси',
        '3' =>'Ер участкасига бўлган ижара шартномаси',
        '4' =>'Ер балл бонитет бўйича кадастр маълумотномаси',
    ];
}
