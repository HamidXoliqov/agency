<?php

namespace app\modules\manuals\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "appeal_status".
 *
 * @property int $id
 * @property string|null $name_uz
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class AppealStatus extends \yii\db\ActiveRecord
{
//    Statuslar ro'yhati
//1	"Янги"	"Новый"	"New"
//2	"Агентликка жўнатилди"	"Отправлено в агентство"	"Sent to the agency"
//3	"Агентлик қабул қилди"	"Агентство приняло"	"The agency accepted"
//4	"Агентлик аризани қайтарди"	"Агентство вернуло заявку"	"The agency returned the application"
//5	"Кенгашга ўтказилди"	"Передано в Совет"	"Referred to the Council"
//6	"Кенгаш рад этди"	"Совет отказался"	"Council refused"
//7	"Кенгаш қабул қилди"	"Совет принял"	"Council accepted"
//8	"Субсидия ажратилди"	"Субсидия была выделена"	"The subsidy was allocated"

    const APPEAL_NEW = 1;
    const APPEAL_SENT_TO_AGENCY = 2;
    const APPEAL_AGENCY_ACCEPTED = 3;
    const APPEAL_AGENCY_RETURNED = 4;
    const APPEAL_REFERRED_TO_COUNCIL = 5;
    const APPEAL_COUNCIL_REFUSED = 6;
    const APPEAL_COUNCIL_ACCEPTED = 7;
    const APPEAL_SUBSIDY_WAS_ALLOCATED = 8;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appeal_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name_uz', 'name_ru', 'name_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_uz' => Yii::t('app', 'Name Uz'),
            'name_ru' => Yii::t('app', 'Name Ru'),
            'name_en' => Yii::t('app', 'Name En'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
    public static function getStatusList()
    {
        return ArrayHelper::map(AppealStatus::find()->orderBy(['id'=>SORT_ASC])->asArray()->all(), 'id', 'name_'.Yii::$app->language);
    }
    public static function getNewOn()
    {
        return ArrayHelper::map(self::find()->where(['id'=>self::APPEAL_NEW])->asArray()->all(), 'id', 'name_'.Yii::$app->language);
    }
}
