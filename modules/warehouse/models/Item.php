<?php

namespace app\modules\warehouse\models;

use app\modules\manuals\models\Countries;
use app\modules\manuals\models\References;
use Yii;

/**
 * This is the model class for table "item".
 *
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ru
 * @property string|null $name_uz
 * @property string|null $short_name
 * @property int|null $category_id
 * @property float|null $size
 * @property float|null $weight
 * @property int|null $unit_id
 * @property string|null $article
 * @property int|null $country_id
 * @property string|null $add_info
 * @property int|null $status
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property float|null $stock_limit
 *
 * @property DocumentItem[] $documentItems
 * @property Countries $country
 * @property ItemCategory $category
 * @property References $unit
 * @property ItemBarcode[] $itemBarcodes
 * @property ItemModels[] $itemModels
 */
class Item extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'unit_id', 'country_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['category_id', 'unit_id', 'country_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['size', 'weight', 'stock_limit'], 'number'],
            [['name_en', 'name_ru', 'name_uz', 'article', 'add_info'], 'string', 'max' => 255],
            [['short_name'], 'string', 'max' => 50],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Countries::className(), 'targetAttribute' => ['country_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ItemCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => References::className(), 'targetAttribute' => ['unit_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app-msg', 'ID'),
            'name_en' => Yii::t('app-msg', 'Name En'),
            'name_ru' => Yii::t('app-msg', 'Name Ru'),
            'name_uz' => Yii::t('app-msg', 'Name Uz'),
            'short_name' => Yii::t('app-msg', 'Short Name'),
            'category_id' => Yii::t('app-msg', 'Category ID'),
            'size' => Yii::t('app-msg', 'Size'),
            'weight' => Yii::t('app-msg', 'Weight'),
            'unit_id' => Yii::t('app-msg', 'Unit ID'),
            'article' => Yii::t('app-msg', 'Article'),
            'country_id' => Yii::t('app-msg', 'Country ID'),
            'add_info' => Yii::t('app-msg', 'Add Info'),
            'status' => Yii::t('app-msg', 'Status'),
            'created_by' => Yii::t('app-msg', 'Created By'),
            'updated_by' => Yii::t('app-msg', 'Updated By'),
            'created_at' => Yii::t('app-msg', 'Created At'),
            'updated_at' => Yii::t('app-msg', 'Updated At'),
            'stock_limit' => Yii::t('app-msg', 'Stock Limit'),
        ];
    }

    /**
     * Gets query for [[DocumentItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentItems()
    {
        return $this->hasMany(DocumentItem::className(), ['item_id' => 'id']);
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Countries::className(), ['id' => 'country_id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ItemCategory::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Unit]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(References::className(), ['id' => 'unit_id']);
    }

    /**
     * Gets query for [[ItemBarcodes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemBarcodes()
    {
        return $this->hasMany(ItemBarcode::className(), ['item_id' => 'id']);
    }

    /**
     * Gets query for [[ItemModels]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemModels()
    {
        return $this->hasMany(ItemModels::className(), ['item_id' => 'id']);
    }
}
