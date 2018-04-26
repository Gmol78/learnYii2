<?php

use yii\db\Migration;

/**
 * Class m180416_100507_add_foreign_keys
 */
class m180416_100507_add_foreign_keys extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /*
        \Yii::$app->db->createCommand()-> addForeignKey('fx_access_user', 'access', ['user_id'], 'user', ['id'])->execute();
        \Yii::$app->db->createCommand()-> addForeignKey('fx_access_note', 'access', ['note_id'], 'note', ['id'])->execute();
        \Yii::$app->db->createCommand()-> addForeignKey('fx_note_user', 'note', ['creator_id'], 'user', ['id'])->execute();*/

        $this->addForeignKey('fx_access_user', 'access', ['user_id'], 'user', ['id']);
        $this->addForeignKey('fx_access_note', 'access', ['note_id'], 'note', ['id']);
        $this->addForeignKey('fx_note_user', 'note', ['creator_id'], 'user', ['id']);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fx_access_user', 'access');
        $this->dropForeignKey('fx_access_note', 'access');
        $this->dropForeignKey('fx_note_user', 'note');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180416_100507_add_foreign_keys cannot be reverted.\n";

        return false;
    }
    */
}
