<?php

namespace common\models;

use TheSeer\Tokenizer\Exception;
use Yii;
use yii\base\Model;
use yii\helpers\Url;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public $filename;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' =>'png, jpg, jpeg, webp', 'maxSize' => 10 * 1024 * 1024]
        ];
    }


    public function upload()
    {
        if ($this->validate()) {

            $guid = trim(com_create_guid(), '{}');
            $this->filename = $guid . '.' . $this->imageFile->extension;

            $this->imageFile->saveAs(\Yii::getAlias('@public') . '\images\products\\'. $this->filename);

            return true;

        } else {
            return false;
        }
    }
}