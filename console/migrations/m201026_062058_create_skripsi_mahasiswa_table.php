<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%skripsi_mahasiswa}}`.
 */
class m201026_062058_create_skripsi_mahasiswa_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%skripsi_mahasiswa}}', [
            'id' => $this->primaryKey(),
            'skripsi_id' => $this->integer(),
            'mahasiswa_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-skripsi_mahasiswa-skripsi_id',
            'skripsi_mahasiswa',
            'skripsi_id'
        );

        $this->addForeignKey(
            'fk-skripsi_mahasiswa-skripsi_id',
            'skripsi_mahasiswa',
            'skripsi_id',
            'skripsi',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-skripsi_mahasiswa-mahasiswa_id',
            'skripsi_mahasiswa',
            'mahasiswa_id'
        );

        $this->addForeignKey(
            'fk-skripsi_mahasiswa-mahasiswa_id',
            'skripsi_mahasiswa',
            'mahasiswa_id',
            'mahasiswa',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%skripsi_mahasiswa}}');
    }
}
