<?php

namespace app\modules\warehouse\models;

use Yii;

/**
 * This is the model class for table "item_category".
 *
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ru
 * @property string|null $name_uz
 * @property int|null $parent_id
 * @property int|null $status
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Item[] $items
 * @property ItemCategory $parent
 * @property ItemCategory[] $itemCategories
 * @property License[] $licenses
 */
class ItemCategory extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['parent_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['name_en', 'name_ru', 'name_uz'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => ItemCategory::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_en' => Yii::t('app', 'Name En'),
            'name_ru' => Yii::t('app', 'Name Ru'),
            'name_uz' => Yii::t('app', 'Name Uz'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'status' => Yii::t('app', 'Status'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Items]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::className(), ['category_id' => 'id']);
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(ItemCategory::className(), ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[ItemCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemCategories()
    {
        return $this->hasMany(ItemCategory::className(), ['parent_id' => 'id']);
    }

    /**
     * @param null $parent_id
     * @return string
     */
    public static function getItemCategoryTreeViewHtmlForm($parent_id = null)
    {
        $items = ItemCategory::find()->where(['parent_id' => $parent_id])->andWhere(['!=','status', self::STATUS_DELETED])->all();//->andWhere(['status'=> self::STATUS_ACTIVE])
        $items_tree = "";
        foreach ($items as $itemCategory)
        {
            $items_tree .= "<ul><li value='{$itemCategory['id']}' data-parent-id='{$itemCategory['parent_id']}' data-status='{$itemCategory['status']}' data-jstree='{\"opened\" : true}'>{$itemCategory['name_'.Yii::$app->language]}" . self::getItemCategoryTreeViewHtmlForm($itemCategory['id']) . "</li></ul>";
        }
        return $items_tree;
    }

    /**
     * Gets query for [[Licenses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLicenses()
    {
        return $this->hasMany(License::className(), ['item_category_id' => 'id']);
    }
}
