<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "repair".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $car_id
 * @property string $amount
 * @property string $file
 * @property string $file_name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Car $car
 * @property User $user
 */
class Repair extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'repair';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'car_id', 'amount'], 'required'],
            [['user_id', 'car_id'], 'integer'],
            [['amount'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['file', 'file_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'         => Yii::t('repair', 'ID'),
            'user_id'    => Yii::t('repair', 'User ID'),
            'car_id'     => Yii::t('repair', 'Car ID'),
            'amount'     => Yii::t('repair', 'Amount'),
            'file'       => Yii::t('repair', 'File'),
            'file_name'  => Yii::t('repair', 'File Name'),
            'created_at' => Yii::t('repair', 'Created At'),
            'updated_at' => Yii::t('repair', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(Car::className(), ['id' => 'car_id']);
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
     * @return RepairQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RepairQuery(get_called_class());
    }
}
