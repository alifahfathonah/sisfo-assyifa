<?php

use yii\db\Migration;

/**
 * Class m201006_010950_add_skor_column
 */
class m201006_010950_add_skor_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('kuis_jawaban', 'skor', $this->string()->defaultValue(NULL));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('kuis_jawaban', 'skor');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201006_010950_add_skor_column cannot be reverted.\n";

        return false;
    }
    */
}
