<?php

namespace app\modules\manuals\models;

use app\modules\structure\models\Department;
use Yii;

/**
 * This is the model class for table "references".
 *
 * @property int $id
 * @property string|null $name_uz
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property string|null $token
 * @property int|null $sort
 * @property int $references_type_id
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 *
 * @property Department[] $departments
 * @property Department[] $departments0
 * @property ReferencesType $referencesType
 */
class References extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'references';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort', 'references_type_id', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'default', 'value' => null],
            [['sort', 'references_type_id', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['name_uz', 'name_ru', 'name_en', 'token','references_type_id'], 'required'],
            [['name_uz', 'name_ru', 'name_en', 'token'], 'string', 'max' => 50],
            [['token'],'unique'],
            [['references_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ReferencesType::className(), 'targetAttribute' => ['references_type_id' => 'id']],
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
            'token' => Yii::t('app', 'Token'),
            'sort' => Yii::t('app', 'Sort'),
            'references_type_id' => Yii::t('app', 'References Type'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[Departments]].
     *
     * @return yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Department::className(), ['currency_id' => 'id']);
    }

    /**
     * Gets query for [[Departments0]].
     *
     * @return yii\db\ActiveQuery
     */
    public function getDepartments0()
    {
        return $this->hasMany(Department::className(), ['depertment_type_id' => 'id']);
    }

    /**
     * @return yii\db\ActiveQuery
     */
    public function getReferencesType()
    {
        return $this->hasOne(ReferencesType::className(), ['id' => 'references_type_id']);
    }

    /**
     * @param $id
     * @return array|yii\db\DataReader
     * @throws yii\db\Exception
     */
    public function getReferencesSelect($id){
        $sql = "SELECT
                            inf.id,
                            inf.name_uz,
                            inf.name_ru, 
                            inf.name_en,
                            inf.token,
                            inf.sort,
                            inf.status,
                            inf.references_type_id
                            FROM public.\"references\" as inf 
                            left join references_type as ty on ty.id = inf.references_type_id
                   where inf.status NOT IN (%d) AND inf.references_type_id=%d";
        $sql = sprintf($sql,self::STATUS_DELETED,$id);
       return  Yii::$app->db->createCommand($sql)->queryAll();
    }
    public function getReferences($id){
        $sql = "SELECT  
                  ty.id as 
                  references_type_id,
                  ty.name_uz as name_uz,
                  ty.name_ru as name_ru ,
                  ty.name_en as names_en
	             FROM references_type as ty
	             where id = " . $id;
        return  Yii::$app->db->createCommand($sql)->queryAll();
    }
}
