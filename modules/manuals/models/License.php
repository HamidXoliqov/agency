<?php

namespace app\modules\manuals\models;

use app\modules\structure\models\Department;
use app\modules\warehouse\models\ItemCategory;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "license".
 *
 * @property int $id
 * @property string|null $serial_number
 * @property string|null $serial
 * @property int|null $department_id
 * @property string|null $order_number
 * @property int|null $item_category_id
 * @property string|null $order_date
 * @property string|null $given_date
 * @property string|null $expiration_date
 * @property string|null $responsible
 * @property int|null $status
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Department $department
 * @property ItemCategory $itemCategory
 */
class License extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'license';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_date', 'given_date', 'expiration_date','department_id', 'item_category_id','serial_number', 'serial','responsible','order_number'],'required'],
            [['department_id', 'item_category_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['department_id', 'item_category_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['order_date', 'given_date', 'expiration_date'], 'safe'],
            [['serial_number', 'serial', 'order_number', 'responsible'], 'string', 'max' => 255],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['item_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ItemCategory::className(), 'targetAttribute' => ['item_category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'serial_number' => Yii::t('app', 'Serial Number'),
            'serial' => Yii::t('app', 'Serial'),
            'department_id' => Yii::t('app', 'Department'),
            'order_number' => Yii::t('app', 'Order Number'),
            'item_category_id' => Yii::t('app', 'Item Category'),
            'order_date' => Yii::t('app', 'Order Date'),
            'given_date' => Yii::t('app', 'Given Date'),
            'expiration_date' => Yii::t('app', 'Expiration Date'),
            'responsible' => Yii::t('app', 'Responsible'),
            'status' => Yii::t('app', 'Status'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Department]].
     *
     * @return yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }

    /**
     * Gets query for [[ItemCategory]].
     *
     * @return yii\db\ActiveQuery
     */
    public function getItemCategory()
    {
        return $this->hasOne(ItemCategory::className(), ['id' => 'item_category_id']);
    }
    public static function getItemCategoryArray()
    {

        $data = ItemCategory::find()->all();
        $til = "name_".Yii::$app->language;
        return ArrayHelper::map($data,'id',$til);
    }
    public static function getModelIndexLicense(){

        $sql = "SELECT 
   lit.id,
   lit.serial_number,
   lit.serial,
   dep.short_name, 
   lit.order_number,
   itmc.name_uz,
   itmc.name_ru,
   itmc.name_en,
   to_char(lit.order_date, 'mm/dd/yyyy') as order_date,
   to_char(lit.given_date, 'mm/dd/yyyy') as given_date,
   to_char(lit.expiration_date, 'mm/dd/yyyy') as expiration_date,
   lit.responsible,
   lit.status
	FROM public.license as lit
	LEFT JOIN department as dep ON dep.id = lit.department_id
	LEFT JOIN item_category as itmc ON itmc.id = lit.item_category_id";


        return Yii::$app->db->createCommand($sql)->queryAll();;

    }

    /**
     * @param null $parent_id
     * @return string
     */
    public static function getTreeViewHtmlForm($parent_id = null){
        $items = Department::find()->where(['parent_id' => $parent_id,'status'=> self::STATUS_ACTIVE])->asArray()->all();
        $tree = "";
        foreach ($items as $item){
            $tree = $tree."<ul><li value='{$item['id']}' data-jstree='{ \"opened\" : false }'>{$item['short_name']}".self::getTreeViewHtmlForm($item['id'])."</li></ul>";
        }
        return $tree;
    }

    /**
     * @param $id
     * @return array|yii\db\ActiveRecord[]
     */
    public static function getLicenseItems($id)
    {
        return License::find()->where(['department_id' => $id])->asArray()->all();
    }

    /**
     * @param null $parent_id
     * @param int $lvl
     * @return array
     */
    public static function getItemCategoryLists($parent_id=null,$lvl = 0) {
        $regions = ItemCategory::find()->where(['parent_id' => $parent_id])->andWhere(['status'=> self::STATUS_ACTIVE])->all();//->andWhere(['status'=> self::STATUS_ACTIVE])
        $regions_tree = [];
        $probel = "";
        for ($i = 0; $i < $lvl; $i++){
            $probel .= "&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        $lvl++;
        foreach ($regions as $region)
        {
            if ($parent_id == null){
                $regions_tree[$region['id']] = '<b>'.$probel.$region['name_'.Yii::$app->language].'</b>';
            } else {
                $regions_tree[$region['id']] = $probel.$region['name_'.Yii::$app->language];
            }

            $regions_tree = \yii\helpers\ArrayHelper::merge($regions_tree, self::getItemCategoryLists($region['id'], $lvl));
        }
        return $regions_tree;
    }

    public static function getItemDepartmentLists($parent_id=null,$lvl = 0) {
        return Department::getHierarchy();
    }
}
