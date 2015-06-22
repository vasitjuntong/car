<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $car_type_id
 * @property integer $car_brand_id
 * @property string $license_no
 * @property string $registration_at
 * @property string $car_no
 * @property string $engine_no
 * @property string $image_name
 * @property string $image_path
 * @property string $created_at
 * @property string $updated_at
 *
 * @property CarBrand $carBrand
 * @property CarType $carType
 * @property User $user
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'car_type_id', 'car_brand_id', 'license_no', 'car_no', 'engine_no'], 'required'],
            [['user_id', 'car_type_id', 'car_brand_id'], 'integer'],
            [['registration_at', 'created_at', 'updated_at'], 'safe'],
            [['license_no', 'car_no', 'engine_no'], 'string', 'max' => 100],
            [['image_name', 'image_path'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'car_type_id' => Yii::t('app', 'Car Type ID'),
            'car_brand_id' => Yii::t('app', 'Car Brand ID'),
            'license_no' => Yii::t('app', 'License No'),
            'registration_at' => Yii::t('app', 'Registration At'),
            'car_no' => Yii::t('app', 'Car No'),
            'engine_no' => Yii::t('app', 'Engine No'),
            'image_name' => Yii::t('app', 'Image Name'),
            'image_path' => Yii::t('app', 'Image Path'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarBrand()
    {
        return $this->hasOne(CarBrand::className(), ['id' => 'car_brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarType()
    {
        return $this->hasOne(CarType::className(), ['id' => 'car_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return CarQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CarQuery(get_called_class());
    }
}
