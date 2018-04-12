<?php

use yii\db\Migration;

/**
 * Class m180411_174221_create_table_user
 */
class m180411_174221_create_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id'=> $this->primaryKey()->notNull(),
            'username'=> $this->string(255)->notNull(),
            'name'=> $this->string(255)->notNull(),
            'surname'=> $this->string(255)->null(),
            'password_hash'=> $this->string(255)->notNull(),
            'access_token'=> $this->string(255)->null()->defaultValue(null),
            'auth_key'=> $this->string(255)->null()->defaultValue(null),
            'created_at'=> $this->integer()->null(),
            'updated_at'=> $this->integer()->null()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       
        
        $this->dropTable('user');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180411_174221_create_table_user cannot be reverted.\n";

        return false;
    }
    */
}
