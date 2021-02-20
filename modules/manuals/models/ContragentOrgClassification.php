<?php

namespace app\modules\manuals\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\modules\structure\models\OrgClassification;

/**
 * This is the model class for table "contragent_org_classification".
 *
 * @property int $id
 * @property int|null $contragent_id
 * @property int|null $org_classification_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $status
 *
 * @property Contragent $contragent
 * @property OrgClassification $orgClassification
 */
class ContragentOrgClassification extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contragent_org_classification';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['org_classification_id'], 'required'],
            [['contragent_id', 'org_classification_id', 'created_at', 'updated_at', 'created_by', 'updated_by', 'status'], 'default', 'value' => null],
            [['contragent_id', 'org_classification_id', 'created_at', 'updated_at', 'created_by', 'updated_by', 'status'], 'integer'],
            [['contragent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contragent::className(), 'targetAttribute' => ['contragent_id' => 'id']],
            [['org_classification_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgClassification::className(), 'targetAttribute' => ['org_classification_id' => 'id']],
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
            'org_classification_id' => Yii::t('app', 'Org Classification ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'status' => Yii::t('app', 'Status'),
        ];
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
     * Gets query for [[OrgClassification]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrgClassification()
    {
        return $this->hasOne(OrgClassification::className(), ['id' => 'org_classification_id']);
    }

    public static function getClasss($id){
        $conorgclas = self::find()->where(['contragent_id' => $id])->all();
        if(!empty($conorgclas)){
            return ArrayHelper::map($conorgclas,'contragent_id','org_classification');
        }
        return [];
    }
}
