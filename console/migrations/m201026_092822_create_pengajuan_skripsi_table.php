<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pengajuan_skripsi}}`.
 */
class m201026_092822_create_pengajuan_skripsi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pengajuan_skripsi}}', [
            'id' => $this->primaryKey(),
            'mahasiswa_id' => $this->integer(),
            'processed_by' => $this->integer(),
            'judul' => $this->string(),
            'konten' => $this->text(),
            'status' => $this->string(),
            'file_url' => $this->string(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);

        $this->createIndex(
            'idx-pengajuan_skripsi-mahasiswa_id',
            'pengajuan_skripsi',
            'mahasiswa_id'
        );

        $this->addForeignKey(
            'fk-pengajuan_skripsi-mahasiswa_id',
            'pengajuan_skripsi',
            'mahasiswa_id',
            'mahasiswa',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-pengajuan_skripsi-processed_by',
            'pengajuan_skripsi',
            'processed_by'
        );

        $this->addForeignKey(
            'fk-pengajuan_skripsi-processed_by',
            'pengajuan_skripsi',
            'processed_by',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pengajuan_skripsi}}');
    }
}
