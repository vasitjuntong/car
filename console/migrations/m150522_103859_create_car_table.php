<?php

use yii\db\Schema;
use yii\db\Migration;

class m150522_103859_create_car_table extends Migration
{

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%car_type}}', [

            'id'         => Schema::TYPE_PK,
            'name'       => Schema::TYPE_STRING . '(255) NOT NULL',
            'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
            'updated_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL',

        ], $tableOptions);

        $this->createTable('{{%car_brand}}', [

            'id'         => Schema::TYPE_PK,
            'name'       => Schema::TYPE_STRING . '(255) NOT NULL',
            'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
            'updated_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL',

        ], $tableOptions);

        $this->createTable('{{%car}}', [

            'id'              => Schema::TYPE_PK,
            'user_id'         => Schema::TYPE_INTEGER . ' NOT NULL',
            'car_type_id'     => Schema::TYPE_INTEGER . ' NOT NULL',
            'car_brand_id'    => Schema::TYPE_INTEGER . ' NOT NULL',
            'license_no'      => Schema::TYPE_STRING . '(100) NOT NULL',
            'registration_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
            'car_no'          => Schema::TYPE_STRING . '(100) NOT NULL',
            'engine_no'       => Schema::TYPE_STRING . '(100) NOT NULL',
            'image_name'      => Schema::TYPE_STRING . '(255) NULL',
            'image_path'      => Schema::TYPE_STRING . '(255) NULL',
            'created_at'      => Schema::TYPE_TIMESTAMP . ' NOT NULL',
            'updated_at'      => Schema::TYPE_TIMESTAMP . ' NOT NULL',

        ], $tableOptions);

        $this->addForeignKey('car_foreign_key_to_user',
            '{{%car}}', 'user_id',
            '{{%user}}', 'id',
            'cascade', 'cascade');

        $this->addForeignKey('car_foreign_key_to_car_type',
            '{{%car}}', 'car_type_id',
            '{{%car_type}}', 'id',
            'cascade', 'cascade');

        $this->addForeignKey('car_foreign_key_to_car_brand',
            '{{%car}}', 'car_brand_id',
            '{{%car_brand}}', 'id',
            'cascade', 'cascade');

    }

    public function down()
    {

        $this->dropTable('{{%car}}');
        $this->dropTable('{{%car_type}}');
        $this->dropTable('{{%car_brand}}');
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
