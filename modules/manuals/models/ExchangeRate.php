<?php

namespace app\modules\manuals\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "exchange_rate".
 *
 * @property int $id
 * @property int|null $currency_id
 * @property float|null $amount
 * @property int|null $to_currency_id
 * @property float|null $to_amount
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property References $currency
 * @property References $toCurrency
 */
class ExchangeRate extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exchange_rate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['currency_id', 'to_currency_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['currency_id', 'to_currency_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['currency_id', 'to_currency_id','amount', 'to_amount','status'], 'required'],
            [['amount', 'to_amount'], 'number'],
            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => References::className(), 'targetAttribute' => ['currency_id' => 'id']],
            [['to_currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => References::className(), 'targetAttribute' => ['to_currency_id' => 'id']],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'currency_id' => Yii::t('app', 'Currency'),
            'amount' => Yii::t('app', 'Amount'),
            'to_currency_id' => Yii::t('app', 'To currency'),
            'to_amount' => Yii::t('app', 'To amount'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(References::className(), ['id' => 'currency_id']);
    }

    /**
     * @return yii\db\ActiveQuery
     */
    public function getToCurrency()
    {
        return $this->hasOne(References::className(), ['id' => 'to_currency_id']);
    }

    /**
     * @return array
     */
    public static function getCurrencyItems()
    {
        return ArrayHelper::map(References::find()->where(['references_type_id' => 1])->asArray()->all(), 'id', 'name_'.Yii::$app->language);
    }

    public static function getCurrencyOneItem($id)
    {
        return References::find()->where(['id' => $id])->asArray()->one();
    }
}
