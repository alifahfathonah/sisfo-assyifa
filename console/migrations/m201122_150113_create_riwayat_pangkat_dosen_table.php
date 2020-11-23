<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%riwayat_pangkat_dosen}}`.
 */
class m201122_150113_create_riwayat_pangkat_dosen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%riwayat_pangkat_dosen}}', [
            'id' => $this->primaryKey(),
            'id_dosen' => $this->string(),
            'nidn' => $this->string(),
            'nama_dosen' => $this->string(),
            'id_pangkat_golongan' => $this->string(),
            'nama_pangkat_golongan' => $this->string(),
            'sk_pangkat' => $this->string(),
            'tanggal_sk_pangkat' => $this->string(),
            'mulai_sk_pangkat' => $this->string(),
            'masa_kerja_dalam_tahun' => $this->string(),
            'masa_kerja_dalam_bulan' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%riwayat_pangkat_dosen}}');
    }
}
