<?php

use yii\db\Migration;

/**
 * Class m201202_101522_add_id_perguruan_tinggi_to_installation_table
 */
class m201202_101522_add_id_perguruan_tinggi_to_installation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%installation}}', 'id_perguruan_tinggi', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%installation}}', 'id_perguruan_tinggi');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201202_101522_add_id_perguruan_tinggi_to_installation_table cannot be reverted.\n";

        return false;
    }
    */
}
