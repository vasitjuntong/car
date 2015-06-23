<?php

namespace app\models;

use Yii;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class CarBrand extends ActiveRecord
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
        return 'car_brand';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id'         => Yii::t('car_brand', 'ID'),
            'name'       => Yii::t('car_brand', 'Name'),
            'created_at' => Yii::t('car_brand', 'Created At'),
            'updated_at' => Yii::t('car_brand', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Car::className(), ['car_brand_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return CarBrandQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CarBrandQuery(get_called_class());
    }
}
