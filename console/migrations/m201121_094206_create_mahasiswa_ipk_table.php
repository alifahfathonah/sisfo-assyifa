<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mahasiswa_ipk}}`.
 */
class m201121_094206_create_mahasiswa_ipk_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mahasiswa_ipk}}', [
            'id' => $this->primaryKey(),
            'id_registrasi_mahasiswa' => $this->string(),
            'id_mahasiswa' => $this->string(),
            'id_semester' => $this->string(),
            'nama_semester' => $this->string(),
            'nim' => $this->string(),
            'nama_mahasiswa' => $this->string(),
            'angkatan' => $this->string(),
            'id_prodi' => $this->string(),
            'nama_program_studi' => $this->string(),
            'id_status_mahasiswa' => $this->string(),
            'nama_status_mahasiswa' => $this->string(),
            'ips' => $this->string(),
            'ipk' => $this->string(),
            'sks_semester' => $this->string(),
            'sks_total' => $this->string(),
            'biaya_kuliah_smt' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mahasiswa_ipk}}');
    }
}
