<?php

use yii\db\Migration;

/**
 * Class m180412_091629_create_table_note
 */
class m180412_091629_create_table_note extends Migration
{
    /**
     * {@inheritdoc}
     * 
     */
    
    public function safeUp()
    {
        $this->createTable('note', [
            'id'=> $this->primaryKey()->notNull(),
            'text'=> $this->string()->notNull(),
            'creator_id'=> $this->integer()->notNull(),
            'crated_at'=> $this->integer()->null()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('note');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180412_091629_create_table_note cannot be reverted.\n";

        return false;
    }
    */
}
