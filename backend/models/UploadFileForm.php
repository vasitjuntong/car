<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\imagine\Image;
use yii\web\UploadedFile;

class UploadFileForm extends Model
{

    /**
     * @var UploadedFile
     */
    public $file;

    private $fileName;

    private $folder = 'repairs/';

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'xlsx, xls, pdf'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'file' => 'File แนบ',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {

            $this->fileName = time() . '.' . $this->file->extension;

            $basePath = Yii::$app->basePath .
                Yii::$app->params['filePath'] .
                $this->folder;

            $this->file->saveAs($basePath . $this->fileName);

            return [
                'file_name' => $this->file->baseName . '.' . $this->file->extension,
                'file_path' => $basePath . $this->fileName,
            ];
        } else {
            return false;
        }
    }
}