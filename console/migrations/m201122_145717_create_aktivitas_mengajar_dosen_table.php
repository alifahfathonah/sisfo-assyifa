<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%aktivitas_mengajar_dosen}}`.
 */
class m201122_145717_create_aktivitas_mengajar_dosen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%aktivitas_mengajar_dosen}}', [
            'id' => $this->primaryKey(),
            'id_registrasi_dosen' => $this->string(),
            'id_dosen' => $this->string(),
            'nama_dosen' => $this->string(),
            'id_periode' => $this->string(),
            'nama_periode' => $this->string(),
            'id_prodi' => $this->string(),
            'nama_program_studi' => $this->string(),
            'id_matkul' => $this->string(),
            'nama_mata_kuliah' => $this->string(),
            'id_kelas' => $this->string(),
            'nama_kelas_kuliah' => $this->string(),
            'rencana_minggu_pertemuan' => $this->string(),
            'realisasi_minggu_pertemuan' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%aktivitas_mengajar_dosen}}');
    }
}
