<?php

namespace app\models;

use Yii;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class News extends ActiveRecord
{

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class'      => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value'      => new Expression('NOW()'),
            ],
        ];
    }

    public static function tableName()
    {
        return 'news';
    }

    public function rules()
    {
        return [
            [['user_id', 'title', 'description'], 'required'],
            [['user_id'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'image_name', 'image_path'], 'string', 'max' => 255]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id'          => Yii::t('news', 'ID'),
            'user_id'     => Yii::t('news', 'User ID'),
            'title'       => Yii::t('news', 'Title'),
            'description' => Yii::t('news', 'Description'),
            'image_name'  => Yii::t('news', 'Image Name'),
            'image_path'  => Yii::t('news', 'Image Path'),
            'created_at'  => Yii::t('news', 'Created At'),
            'updated_at'  => Yii::t('news', 'Updated At'),
        ];
    }

    public function getUser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id']);
    }
}
