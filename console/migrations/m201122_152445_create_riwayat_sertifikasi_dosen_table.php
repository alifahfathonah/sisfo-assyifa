<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%riwayat_sertifikasi_dosen}}`.
 */
class m201122_152445_create_riwayat_sertifikasi_dosen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%riwayat_sertifikasi_dosen}}', [
            'id' => $this->primaryKey(),
            'id_dosen' => $this->string(),
            'nidn' => $this->string(),
            'nama_dosen' => $this->string(),
            'nomor_peserta' => $this->string(),
            'id_bidang_studi' => $this->string(),
            'nama_bidang_studi' => $this->string(),
            'id_jenis_sertifikasi' => $this->string(),
            'nama_jenis_sertifikasi' => $this->string(),
            'tahun_sertifikasi' => $this->string(),
            'sk_sertifikasi' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%riwayat_sertifikasi_dosen}}');
    }
}
