<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dosen_pengajar}}`.
 */
class m201201_032212_create_dosen_pengajar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dosen_pengajar}}', [
            'id' => $this->primaryKey(),
            'id_aktivitas_mengajar' => $this->string(),
            'id_registrasi_dosen' => $this->string(),
            'id_dosen' => $this->string(),
            'nidn' => $this->string(),
            'nama_dosen' => $this->string(),
            'id_kelas_kuliah' => $this->string(),
            'nama_kelas_kuliah' => $this->string(),
            'id_subtansi' => $this->string(),
            'sks_subtansi_total' => $this->string(),
            'rencana_minggu_pertemuan' => $this->string(),
            'realisasi_minggu_pertemuan' => $this->string(),
            'id_jenis_evaluasi' => $this->string(),
            'nama_jenis_evaluasi' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%dosen_pengajar}}');
    }
}
