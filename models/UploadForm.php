<?php
namespace app\models;

use app\models\Attachment;
use yii\base\Model;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var $file UploadedFile[]
     */
    public $file;
    public $uploadPath = "uploads/";

    public function rules()
    {
        return [
            ['file', 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif, doc, docx, xls, xlsx, pdf, ppt'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $name = uniqid() . '.' . $this->file->extension;
            if($this->file->saveAs($this->uploadPath . $name))
                return $name;
        } else {
            return false;
        }
    }
    public function uploadAjax($dir=null)
    {
        $directory = ($dir!=null) ? $this->uploadPath . "/" . $dir . "/" : $this->uploadPath . "/";
        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }
        $name = $directory.uniqid() . '.' . $this->file->extension;
        $this->file->saveAs($name);
        $attachments = new Attachment();
        $attachments->setAttributes([
            'name' => $this->file->name,
            'size' => $this->file->size,
            'extension' => $this->file->extension,
            'path' => $name,
        ]);
        $attachments->save();
        return $attachments->attributes;
    }
}