<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_detail".
 *
 * @property integer $user_id
 * @property integer $position_id
 * @property string $first_name
 * @property string $last_name
 *
 * @property Position $position
 * @property User $user
 */
class UserDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position_id', 'first_name', 'last_name'], 'required'],
            [['position_id'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('user_detail', 'User ID'),
            'position_id' => Yii::t('user_detail', 'Position ID'),
            'first_name' => Yii::t('user_detail', 'First Name'),
            'last_name' => Yii::t('user_detail', 'Last Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['id' => 'position_id']);
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
     * @return UserDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserDetailQuery(get_called_class());
    }
}
