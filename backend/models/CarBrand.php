<?php

namespace app\models;

use Yii;

class CarBrand extends \yii\db\ActiveRecord
{

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
            'id'         => Yii::t('app', 'ID'),
            'name'       => Yii::t('app', 'Name'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
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
