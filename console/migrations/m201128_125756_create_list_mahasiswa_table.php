<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%list_mahasiswa}}`.
 */
class m201128_125756_create_list_mahasiswa_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%list_mahasiswa}}', [
            'id' => $this->primaryKey(),
            'nama_mahasiswa' => $this->string(),
            'jenis_kelamin' => $this->string(),
            'tanggal_lahir' => $this->string(),
            'id_perguruan_tinggi' => $this->string(),
            'id_mahasiswa' => $this->string(),
            'id_agama' => $this->string(),
            'nama_agama' => $this->string(),
            'id_prodi' => $this->string(),
            'nama_program_studi' => $this->string(),
            'nim' => $this->string(),
            'id_periode' => $this->string(),
            'nama_periode_masuk' => $this->string(),
            'id_registrasi_mahasiswa' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%list_mahasiswa}}');
    }
}
