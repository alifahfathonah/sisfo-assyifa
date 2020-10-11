<?php

use yii\db\Migration;

/**
 * Class m201011_084135_add_tipe_content_column_in_materi
 */
class m201011_084135_add_tipe_content_column_in_materi extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('materi', 'tipe_konten', $this->string()->defaultValue(NULL));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('materi', 'tipe_konten');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201011_084135_add_tipe_content_column_in_materi cannot be reverted.\n";

        return false;
    }
    */
}
