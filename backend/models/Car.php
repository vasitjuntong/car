<?php

namespace app\models;

use Yii;
use yii\db\Expression;
use common\models\User;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class Car extends ActiveRecord
{

    const CAR_STATUS = 'car';
    const BUS_STATUS = 'bus';
    const CAR_LABEL = 'รถยนต์';
    const BUS_LABEL = 'รถบัสปรับอากาศ';

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
        return 'car';
    }

    public function rules()
    {
        return [
            [['user_id', 'car_type', 'car_brand_id', 'license_no', 'car_no', 'engine_no'], 'required'],
            [['user_id', 'car_brand_id'], 'integer'],
            [['car_type'], 'string'],
            [['registration_at', 'created_at', 'updated_at'], 'safe'],
            [['license_no', 'car_no', 'engine_no'], 'string', 'max' => 100],
            [['image_name', 'image_path'], 'string', 'max' => 255]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id'              => Yii::t('car', 'ID'),
            'user_id'         => Yii::t('car', 'User ID'),
            'car_type'        => Yii::t('car', 'Car Type'),
            'car_brand_id'    => Yii::t('car', 'Car Brand ID'),
            'license_no'      => Yii::t('car', 'License No'),
            'registration_at' => Yii::t('car', 'Registration At'),
            'car_no'          => Yii::t('car', 'Car No'),
            'engine_no'       => Yii::t('car', 'Engine No'),
            'image_name'      => Yii::t('car', 'Image Name'),
            'image_path'      => Yii::t('car', 'Image Path'),
            'created_at'      => Yii::t('car', 'Created At'),
            'updated_at'      => Yii::t('car', 'Updated At'),
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

    public static function carTypes()
    {
        return [
            self::CAR_STATUS => self::CAR_LABEL,
            self::BUS_STATUS => self::BUS_LABEL,
        ];
    }
}
