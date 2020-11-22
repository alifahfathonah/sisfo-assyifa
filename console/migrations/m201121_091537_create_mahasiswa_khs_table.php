<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mahasiswa_khs}}`.
 */
class m201121_091537_create_mahasiswa_khs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mahasiswa_khs}}', [
            'id' => $this->primaryKey(),
            'id_registrasi_mahasiswa' => $this->string(),
            'id_prodi' => $this->string(),
            'nama_program_studi' => $this->string(),
            'id_periode' => $this->string(),
            'id_matkul' => $this->string(),
            'nama_mata_kuliah' => $this->string(),
            'id_kelas' => $this->string(),
            'nama_kelas_kuliah' => $this->string(),
            'sks_mata_kuliah' => $this->string(),
            'nilai_angka' => $this->string(),
            'nilai_huruf' => $this->string(),
            'nilai_indeks' => $this->string(),
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
        $this->dropTable('{{%mahasiswa_khs}}');
    }
}
