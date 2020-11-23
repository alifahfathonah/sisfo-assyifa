<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%riwayat_penelitian_dosen}}`.
 */
class m201122_152605_create_riwayat_penelitian_dosen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%riwayat_penelitian_dosen}}', [
            'id' => $this->primaryKey(),
            'id_dosen' => $this->string(),
            'nidn' => $this->string(),
            'nama_dosen' => $this->string(),
            'id_penelitian' => $this->string(),
            'judul_penelitian' => $this->string(),
            'id_kelompok_bidang' => $this->string(),
            'kode_kelompok_bidang' => $this->string(),
            'nama_kelompok_bidang' => $this->string(),
            'id_lembaga_iptek' => $this->string(),
            'nama_lembaga_iptek' => $this->string(),
            'tahun_kegiatan' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%riwayat_penelitian_dosen}}');
    }
}
