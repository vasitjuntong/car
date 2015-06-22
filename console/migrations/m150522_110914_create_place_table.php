<?php

use yii\db\Schema;
use yii\db\Migration;

class m150522_110914_create_place_table extends Migration
{

    public function up()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%place}}', [

            'id'         => Schema::TYPE_PK,
            'name'       => Schema::TYPE_STRING . '(255) NOT NULL',
            'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
            'updated_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL',

        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%place}}');
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
