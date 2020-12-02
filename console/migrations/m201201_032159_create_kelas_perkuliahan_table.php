<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kelas_perkuliahan}}`.
 */
class m201201_032159_create_kelas_perkuliahan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kelas_perkuliahan}}', [
            'id' => $this->primaryKey(),
            'id_kelas_kuliah' => $this->string(),
            'id_prodi' => $this->string(),
            'nama_program_studi' => $this->string(),
            'id_semester' => $this->string(),
            'nama_semester' => $this->string(),
            'id_matkul' => $this->string(),
            'kode_mata_kuliah' => $this->string(),
            'nama_mata_kuliah' => $this->string(),
            'nama_kelas_kuliah' => $this->string(),
            'sks' => $this->string(),
            'id_dosen' => $this->string(),
            'nama_dosen' => $this->string(),
            'jumlah_mahasiswa' => $this->string(),
            'apa_untuk_pditt' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%kelas_perkuliahan}}');
    }
}
