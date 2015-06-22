<?php

use yii\db\Schema;
use yii\db\Migration;

class m150522_102501_create_news_table extends Migration
{

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%news}}', [
            'id'          => Schema::TYPE_PK,
            'user_id'     => Schema::TYPE_INTEGER . ' NOT NULL',
            'title'       => Schema::TYPE_STRING . '(255) NOT NULL',
            'description' => Schema::TYPE_TEXT . ' NOT NULL',
            'image_name'  => Schema::TYPE_STRING . '(255) NULL',
            'image_path'  => Schema::TYPE_STRING . '(255) NULL',
            'created_at'  => Schema::TYPE_TIMESTAMP . ' NOT NULL',
            'updated_at'  => Schema::TYPE_TIMESTAMP . ' NOT NULL',
        ], $tableOptions);

        $this->addForeignKey('foreign_key_to_user',
            '{{%news}}', 'user_id',
            '{{%user}}', 'id',
            'cascade', 'cascade');
    }

    public function down()
    {
        $this->dropTable('{{%news}}');
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
