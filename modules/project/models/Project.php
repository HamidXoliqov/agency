<?php

namespace app\modules\project\models;

use app\models\BaseModel;
use app\modules\admin\models\Users;
use app\modules\manuals\models\Bank;
use app\modules\manuals\models\References;
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string|null $name x
 * @property string|null $deadline_date 3
 * @property string|null $project_capacity 5
 * @property float|null $total_cost 7
 * @property int|null $total_cost_currency_id 7
 * @property float|null $reamin_on_year_begin 12
 * @property int|null $remain_on_year_begin_currency_id 12
 * @property string|null $assimilation 13
 * @property string|null $production_time 38
 * @property string|null $delivery_time 39
 * @property string|null $installation_time 40
 * @property string|null $add_info 42
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 * @property int|null $lending_bank_id 41
 *
 * @property References $totalCostCurrency
 * @property References $remainOnYearBeginCurrency
 * @property Bank $lendingBank
 * @property Users $createdBy
 * @property Users $updatedBy
 * @property Project1321Point[] $project1321Points
 * @property Project2226Point[] $project2226Points
 * @property Project2Point[] $project2Points
 * @property Project3Point[] $project3Points
 * @property Project811Point[] $project811Points
 */
class Project extends BaseModel
{
    public $project_attachment;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['deadline_date', 'production_time', 'delivery_time', 'installation_time'], 'safe'],
            [['total_cost', 'reamin_on_year_begin'], 'number'],
            [['total_cost_currency_id', 'remain_on_year_begin_currency_id', 'created_at', 'created_by', 'updated_at', 'updated_by', 'lending_bank_id'], 'default', 'value' => null],
            [['total_cost_currency_id', 'remain_on_year_begin_currency_id', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by', 'lending_bank_id'], 'integer'],
            [['name', 'project_capacity', 'assimilation'], 'string', 'max' => 255],
            [['add_info'], 'string', 'max' => 4096],
            [['total_cost_currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => References::class, 'targetAttribute' => ['total_cost_currency_id' => 'id']],
            [['remain_on_year_begin_currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => References::class, 'targetAttribute' => ['remain_on_year_begin_currency_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['updated_by' => 'id']],
            [['lending_bank_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bank::class, 'targetAttribute' => ['lending_bank_id' => 'id']],
            [['project_attachment'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'deadline_date' => Yii::t('app', 'Deadline Date'),
            'project_capacity' => Yii::t('app', 'Project Capacity'),
            'total_cost' => Yii::t('app', 'Total Cost'),
            'total_cost_currency_id' => Yii::t('app', 'Total Cost Currency ID'),
            'reamin_on_year_begin' => Yii::t('app', 'Reamin On Year Begin {date}', ['date' => '01.01.'.date('Y', strtotime('+1 year'))]),
            'remain_on_year_begin_currency_id' => Yii::t('app', 'Remain On Year Begin Currency ID'),
            'assimilation' => Yii::t('app', 'Assimilation'),
            'production_time' => Yii::t('app', 'Production Time'),
            'delivery_time' => Yii::t('app', 'Delivery Time'),
            'installation_time' => Yii::t('app', 'Installation Time'),
            'add_info' => Yii::t('app', 'Add Info'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'lending_bank_id' => Yii::t('app', 'Lending Bank ID'),
        ];
    }

    /**
     * Gets query for [[TotalCostCurrency]].
     *
     * @return ActiveQuery
     */
    public function getTotalCostCurrency()
    {
        return $this->hasOne(References::class, ['id' => 'total_cost_currency_id']);
    }

    /**
     * Gets query for [[TotalCostCurrency]].
     *
     * @return ActiveQuery
     */
    public function getLendingBank()
    {
        return $this->hasOne(Bank::class, ['id' => 'lending_bank_id']);
    }

    /**
     * Gets query for [[RemainOnYearBeginCurrency]].
     *
     * @return ActiveQuery
     */
    public function getRemainOnYearBeginCurrency()
    {
        return $this->hasOne(References::class, ['id' => 'remain_on_year_begin_currency_id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Users::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(Users::class, ['id' => 'updated_by']);
    }

    /**
     * Gets query for [[Project1321Points]].
     *
     * @return ActiveQuery
     */
    public function getProject1321Points()
    {
        return $this->hasMany(Project1321Point::class, ['project_id' => 'id']);
    }

    /**
     * Gets query for [[Project2226Points]].
     *
     * @return ActiveQuery
     */
    public function getProject2226Points()
    {
        return $this->hasMany(Project2226Point::class, ['project_id' => 'id']);
    }

    /**
     * Gets query for [[Project2Points]].
     *
     * @return ActiveQuery
     */
    public function getProject2Points()
    {
        return $this->hasMany(Project2Point::class, ['project_id' => 'id']);
    }

    /**
     * Gets query for [[Project3Points]].
     *
     * @return ActiveQuery
     */
    public function getProject3Points()
    {
        return $this->hasMany(Project3Point::class, ['project_id' => 'id']);
    }

    /**
     * Gets query for [[Project811Points]].
     *
     * @return ActiveQuery
     */
    public function getProject811Points()
    {
        return $this->hasMany(Project811Point::class, ['project_id' => 'id']);
    }

    public function getProjectAttachment()
    {
            return $this->hasMany(ProjectAttachment::class, ['project_id' => 'id']);
    }
}
