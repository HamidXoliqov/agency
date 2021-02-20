<?php

namespace app\modules\structure\models;

use app\models\BaseModel;
use app\modules\manuals\models\References;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "department".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string|null $name_uz
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property string|null $short_name
 * @property int|null $currency_id
 * @property int|null $department_type_id
 * @property string|null $inn
 * @property string|null $okonx
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property Department $parent
 * @property Department[] $departments
 * @property Directory $currency
 * @property Directory $depertmentType
 */
class Department extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(){
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'currency_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['parent_id', 'currency_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by', 'department_type_id'], 'integer'],
            [['name_uz', 'name_ru', 'name_en'], 'string', 'max' => 255],
            [['name_uz', 'name_ru', 'name_en'], 'required'],
            [['short_name'], 'string', 'max' => 50],
            [['inn', 'okonx'], 'string', 'max' => 25],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['parent_id' => 'id']],
            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => References::className(), 'targetAttribute' => ['currency_id' => 'id']],
            [['department_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => References::className(), 'targetAttribute' => ['department_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'name_uz' => Yii::t('app', 'Name Uz'),
            'name_ru' => Yii::t('app', 'Name Ru'),
            'name_en' => Yii::t('app', 'Name En'),
            'short_name' => Yii::t('app', 'Short Name of department'),
            'currency_id' => Yii::t('app', 'Select Currency'),
            'inn' => Yii::t('app', 'Inn'),
            'okonx' => Yii::t('app', 'Okonx'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        );
    }

    /**
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['department_id' => 'id']);
    }

    /**
     * @return yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Department::className(), ['id' => 'parent_id']);
    }

    /**
     * @return yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Department::className(), ['parent_id' => 'id']);
    }

    /**
     * @return yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(References::className(), ['id' => 'currency_id']);
    }

    /**
     * @param null $parent_id
     * @return string
     */
    public static function getTreeViewHtmlForm($parent_id = null){
        $items = Department::find()->where(['parent_id' => $parent_id])->andWhere(['!=', 'status', self::STATUS_DELETED])->asArray()->all();
        $tree = "";
        $bol = 1;
        foreach ($items as $item){
            if ($parent_id == null && $bol == 1) {
                $bol = 0;
                $tree = $tree . "<ul><li value='{$item['id']}'  data-jstree='{ \"opened\" : true, \"selected\" : true }'>{$item['short_name']}" . self::getTreeViewHtmlForm($item['id']) . "</li></ul>";
            } else {
                $tree = $tree . "<ul><li value='{$item['id']}'  data-jstree='{ \"opened\" : true }'>{$item['short_name']}" . self::getTreeViewHtmlForm($item['id']) . "</li></ul>";
            }
        }
        return $tree;
    }

    /**
     * @param null $parent_id
     * @return string
     */
    public static function getTreeViewHtmlFormId($parent_id = null, $id = null){
        $items = Department::find()->where(['parent_id' => $parent_id]);

            if ($parent_id == null) {
                $items->andWhere(['id' => $id]);
            }

        $departments = $items->andWhere(['!=', 'status', self::STATUS_DELETED])->asArray()->all();
        $tree = "";
        $bol = 1;
        foreach ($departments as $item){
            if ($parent_id == null && $bol == 1) {
                $bol = 0;
                $tree = $tree . "<ul><li value='{$item['id']}'  data-jstree='{ \"opened\" : true, \"selected\" : true }'>{$item['short_name']}" . self::getTreeViewHtmlForm($item['id']) . "</li></ul>";
            } else {
                $tree = $tree . "<ul><li value='{$item['id']}'  data-jstree='{ \"opened\" : true }'>{$item['short_name']}" . self::getTreeViewHtmlForm($item['id']) . "</li></ul>";
            }
        }
        return $tree;
    }

    public static function getCurrencyItems()
    {
        return ArrayHelper::map(References::find()->where(['references_type_id' => 1])->asArray()->all(), 'id', 'name_'.Yii::$app->language);
    }

    public static function getDepartmentTypeItems()
    {
        return ArrayHelper::map(References::find()->where(['references_type_id' => 2])->asArray()->all(), 'id', 'name_'.Yii::$app->language);
    }

    /**
     * @param null $parent_id
     * @param int $lvl
     * @return array
     */
    public static function getHierarchy($parent_id = null, $lvl = 0) {
        $regions = Department::find()->where(['parent_id' => $parent_id])->andWhere(['status'=> self::STATUS_ACTIVE])->all();//->andWhere(['status'=> self::STATUS_ACTIVE])
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
            $regions_tree = \yii\helpers\ArrayHelper::merge($regions_tree, self::getHierarchy($region['id'], $lvl));
        }
        return $regions_tree;
    }
}
