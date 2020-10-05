<?php

use yii\db\Migration;

/**
 * Class m201004_145742_add_tipe_column_in_materi
 */
class m201004_145742_add_tipe_column_in_materi extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('materi', 'tipe', $this->string()->defaultValue(NULL));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('materi', 'tipe');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201004_145742_add_tipe_column_in_materi cannot be reverted.\n";

        return false;
    }
    */
}
