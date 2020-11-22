<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mahasiswa_krs}}`.
 */
class m201121_090818_create_mahasiswa_krs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mahasiswa_krs}}', [
            'id' => $this->primaryKey(),
            'id_registrasi_mahasiswa' => $this->string(),
            'id_periode' => $this->string(),
            'id_prodi' => $this->string(),
            'nama_program_studi' => $this->string(),
            'id_matkul' => $this->string(),
            'kode_mata_kuliah' => $this->string(),
            'nama_mata_kuliah' => $this->string(),
            'id_kelas' => $this->string(),
            'nama_kelas_kuliah' => $this->string(),
            'sks_mata_kuliah' => $this->string(),
            'nim' => $this->string(),
            'nama_mahasiswa' => $this->string(),
            'angkatan' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mahasiswa_krs}}');
    }
}
