<?php

namespace common\models;

use TheSeer\Tokenizer\Exception;
use Yii;
use yii\base\Model;
use yii\helpers\Url;
use yii\web\UploadedFile;

class UploadFormServicos extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public $filename;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' =>'png, jpg, jpeg, webp', 'maxSize' => 10 * 1024 * 1024]
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            if ($this->imageFile) {
                $guid = trim(com_create_guid(), '{}');
                $this->filename = $guid . '.' . $this->imageFile->extension;

                $this->imageFile->saveAs(\Yii::getAlias('@public') . '\images\services\\'. $this->filename);

                return true;
            } else {
                $this->addError('imageFile', 'Seleciona uma imagem.');
                return false;
            }
        } else {
            return false;
        }
    }

}