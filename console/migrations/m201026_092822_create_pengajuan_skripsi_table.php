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
            'judul' => $this->string(),
            'konten' => $this->text(),
            'status' => $this->string(),
            'file_url' => $this->string(),
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
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pengajuan_skripsi}}');
    }
}
