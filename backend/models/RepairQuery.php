<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Repair]].
 *
 * @see Repair
 */
class RepairQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Repair[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Repair|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}