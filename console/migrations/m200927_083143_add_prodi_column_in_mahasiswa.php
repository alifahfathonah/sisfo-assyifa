<?php

use yii\db\Migration;

/**
 * Class m200927_083143_add_prodi_column_in_mahasiswa
 */
class m200927_083143_add_prodi_column_in_mahasiswa extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('mahasiswa', 'prodi_id', $this->integer()->defaultValue(NULL));

        $this->createIndex(
            'idx-mahasiswa-prodi_id',
            'mahasiswa',
            'prodi_id'
        );

        $this->addForeignKey(
            'fk-mahasiswa-prodi_id',
            'mahasiswa',
            'prodi_id',
            'prodi',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('mahasiswa', 'prodi_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200927_083143_add_prodi_column_in_mahasiswa cannot be reverted.\n";

        return false;
    }
    */
}
