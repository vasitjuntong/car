<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Car]].
 *
 * @see Car
 */
class CarQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Car[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Car|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}