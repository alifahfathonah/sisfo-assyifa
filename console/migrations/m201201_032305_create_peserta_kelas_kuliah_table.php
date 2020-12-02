<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%peserta_kelas_kuliah}}`.
 */
class m201201_032305_create_peserta_kelas_kuliah_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%peserta_kelas_kuliah}}', [
            'id' => $this->primaryKey(),
            'id_kelas_kuliah' => $this->string(),
            'id_registrasi_mahasiswa' => $this->string(),
            'id_mahasiswa' => $this->string(),
            'nim' => $this->string(),
            'nama_mahasiswa' => $this->string(),
            'id_matkul' => $this->string(),
            'kode_mata_kuliah' => $this->string(),
            'nama_mata_kuliah' => $this->string(),
            'id_prodi' => $this->string(),
            'nama_program_studi' => $this->string(),
            'angkatan' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%peserta_kelas_kuliah}}');
    }
}
