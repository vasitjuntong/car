<?php

use yii\db\Schema;
use yii\db\Migration;

class m130524_201442_init extends Migration
{

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%position}}', [
            'id'         => Schema::TYPE_PK,
            'name'       => Schema::TYPE_STRING . '(255) NOT NULL COMMENT "ตำแหน่ง"',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%user}}', [
            'id'                   => Schema::TYPE_PK,
            'username'             => Schema::TYPE_STRING . ' NOT NULL COMMENT "ชื่อผู้ใช้"',
            'auth_key'             => Schema::TYPE_STRING . '(32) NOT NULL COMMENT ""',
            'password_hash'        => Schema::TYPE_STRING . ' NOT NULL',
            'password_reset_token' => Schema::TYPE_STRING,
            'email'                => Schema::TYPE_STRING . ' NOT NULL COMMENT "อีเมล์"',
            'status'               => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at'           => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at'           => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%user_detail}}', [
            'user_id'     => Schema::TYPE_PK,
            'position_id' => Schema::TYPE_INTEGER . ' NOT NULL COMMENT "ตำแหน่ง"',
            'first_name'  => Schema::TYPE_STRING . '(255) NOT NULL COMMENT "ชื่อ"',
            'last_name'   => Schema::TYPE_STRING . '(255) NOT NULL COMMENT "นามสกุล"',
        ], $tableOptions);

        $this->addForeignKey('foreign_key_to_user_table',
            '{{%user_detail}}', 'user_id',
            '{{%user}}', 'id',
            'CASCADE', 'CASCADE');

        $this->addForeignKey('foreign_key_to_position_table',
            '{{%user_detail}}', 'position_id',
            '{{%position}}', 'id',
            'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%user_detail}}');
        $this->dropTable('{{%position}}');
        $this->dropTable('{{%user}}');
    }
}
