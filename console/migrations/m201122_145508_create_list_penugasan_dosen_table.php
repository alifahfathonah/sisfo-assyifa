<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%list_penugasan_dosen}}`.
 */
class m201122_145508_create_list_penugasan_dosen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%list_penugasan_dosen}}', [
            'id' => $this->primaryKey(),
            'id_registrasi_dosen' => $this->string(),
            'id_dosen' => $this->string(),
            'nama_dosen' => $this->string(),
            'nidn' => $this->string(),
            'id_tahun_ajaran' => $this->string(),
            'nama_tahun_ajaran' => $this->string(),
            'id_perguruan_tinggi' => $this->string(),
            'nama_perguruan_tinggi' => $this->string(),
            'id_prodi' => $this->string(),
            'nama_program_studi' => $this->string(),
            'nomor_surat_tugas' => $this->string(),
            'tanggal_surat_tugas' => $this->string(),
            'mulai_surat_tugas' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%list_penugasan_dosen}}');
    }
}
