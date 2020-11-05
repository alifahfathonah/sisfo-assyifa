<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%praktek_file}}`.
 */
class m201104_123503_create_praktek_file_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%praktek_file}}', [
            'id' => $this->primaryKey(),
            'praktek_id' => $this->integer(),
            'mahasiswa_id' => $this->integer(),
            'dosen_id' => $this->integer(),
            'file_url' => $this->string(),
            'file_koreksi_url' => $this->string(),
            'keterangan' => $this->text(),
        ]);

        $this->createIndex(
            'idx-praktek_file-praktek_id',
            'praktek_file',
            'praktek_id'
        );

        $this->addForeignKey(
            'fk-praktek_file-praktek_id',
            'praktek_file',
            'praktek_id',
            'praktek',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-praktek_file-dosen_id',
            'praktek_file',
            'dosen_id'
        );

        $this->addForeignKey(
            'fk-praktek_file-dosen_id',
            'praktek_file',
            'dosen_id',
            'dosen',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-praktek_file-mahasiswa_id',
            'praktek_file',
            'mahasiswa_id'
        );

        $this->addForeignKey(
            'fk-praktek_file-mahasiswa_id',
            'praktek_file',
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
        $this->dropTable('{{%praktek_file}}');
    }
}
