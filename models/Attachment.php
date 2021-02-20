<?php

namespace app\models;

use app\modules\admin\models\Users;
use app\modules\project\models\ProjectAttachment;
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "attachment".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $size
 * @property string|null $extension
 * @property string|null $path
 * @property int|null $status
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_by
 * @property int|null $updated_at
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 * @property ProjectAttachment[] $projectAttachments
 */
class Attachment extends BaseModel
{

    public $file_1;
    public $file_2;
    public $file_3;
    public $file_4;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attachment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['size', 'status', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'default', 'value' => null],
            [['size', 'status', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['name', 'extension', 'path'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['updated_by' => 'id']],
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
            'size' => Yii::t('app', 'Size'),
            'extension' => Yii::t('app', 'Extension'),
            'path' => Yii::t('app', 'Path'),
            'status' => Yii::t('app', 'Status'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
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
     * Gets query for [[ProjectAttachments]].
     *
     * @return ActiveQuery
     */
    public function getProjectAttachments()
    {
        return $this->hasMany(ProjectAttachment::class, ['attachment_id' => 'id']);
    }

    public static function getUpload($id)
    {
        $attachment = self::findOne($id);
        return $attachment->path;
    }
}
