<?php

use yii\db\Migration;

/**
 * Class m200927_151604_add_role_column_in_application
 */
class m200927_151604_add_role_column_in_application extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('application', 'role', $this->string()->defaultValue(NULL));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('application', 'role');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200927_151604_add_role_column_in_application cannot be reverted.\n";

        return false;
    }
    */
}
