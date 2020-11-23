<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%list_penugasan_semua_dosen}}`.
 */
class m201122_152749_create_list_penugasan_semua_dosen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%list_penugasan_semua_dosen}}', [
            'id' => $this->primaryKey(),
            'id_registrasi_dosen' => $this->string(),
            'id_dosen' => $this->string(),
            'nama_dosen' => $this->string(),
            'nidn' => $this->string(),
            'jenis_kelamin' => $this->string(),
            'id_tahun_ajaran' => $this->string(),
            'id_prodi' => $this->string(),
            'program_studi' => $this->string(),
            'nomor_surat_tugas' => $this->string(),
            'tanggal_surat_tugas' => $this->string(),
            'apakah_homebase' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%list_penugasan_semua_dosen}}');
    }
}
