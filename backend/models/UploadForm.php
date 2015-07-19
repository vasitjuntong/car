<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\imagine\Image;
use yii\web\UploadedFile;

class UploadForm extends Model
{

    /**
     * @var UploadedFile
     */
    public $imageFile;

    private $fileName;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'imageFile' => 'รูปภาพ',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {

            $this->fileName = time() . '.' . $this->imageFile->extension;

            $this->imageFile->saveAs(
                Yii::$app->basePath .
                Yii::$app->params['filePath'] .
                $this->fileName);

            return [
                'image_name' => $this->imageFile->baseName . '.' . $this->imageFile->extension,
                'image_path' => Yii::$app->params['filePath'] . $this->fileName,
            ];
        } else {
            return false;
        }
    }

    public function thumbnail()
    {
        return Image::thumbnail(
            Yii::$app->basePath .
            Yii::$app->params['filePath'] .
            $this->fileName, 120, 120)
            ->save(
                Yii::$app->basePath .
                Yii::$app->params['fileThumbnailPath'] .
                $this->fileName, [
                'quality' => 50
            ]);
    }
}