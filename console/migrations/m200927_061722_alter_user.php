<?php

use yii\db\Migration;

/**
 * Class m200927_061722_alter_user
 */
class m200927_061722_alter_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('user', 'auth_key', $this->string()->defaultValue(NULL));
        $this->alterColumn('user', 'created_at', $this->timestamp()->defaultValue(NULL));
        $this->alterColumn('user', 'updated_at', $this->timestamp()->defaultValue(NULL));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200927_061722_alter_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200927_061722_alter_user cannot be reverted.\n";

        return false;
    }
    */
}
