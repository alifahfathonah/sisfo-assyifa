<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%nilai_kelas_kuliah}}`.
 */
class m201201_032437_create_nilai_kelas_kuliah_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%nilai_kelas_kuliah}}', [
            'id' => $this->primaryKey(),
            'id_registrasi_mahasiswa' => $this->string(),
            'id_kelas_kuliah' => $this->string(),
            'nilai_angka' => $this->string(),
            'nilai_indeks' => $this->string(),
            'nilai_huruf' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%nilai_kelas_kuliah}}');
    }
}
