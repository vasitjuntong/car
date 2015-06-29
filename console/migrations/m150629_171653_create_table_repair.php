<?php

use yii\db\Schema;
use yii\db\Migration;

class m150629_171653_create_table_repair extends Migration
{

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%repair}}', [

            'id'         => Schema::TYPE_PK,
            'user_id'    => Schema::TYPE_INTEGER . ' NOT NULL',
            'car_id'     => Schema::TYPE_INTEGER . ' NOT NULL',
            'amount'     => Schema::TYPE_DECIMAL . '(10,2) NOT NULL',
            'file'       => Schema::TYPE_STRING . ' NULL',
            'file_name'  => Schema::TYPE_STRING . ' NULL',
            'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
            'updated_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL',

        ], $tableOptions);

        $this->addForeignKey('repair_foreign_key_to_user',
            '{{%repair}}', 'user_id',
            '{{%user}}', 'id',
            'cascade', 'cascade');

        $this->addForeignKey('repair_foreign_key_to_car',
            '{{%repair}}', 'car_id',
            '{{%car}}', 'id',
            'cascade', 'cascade');
    }

    public function down()
    {
        $this->dropTable('{{%repair}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
