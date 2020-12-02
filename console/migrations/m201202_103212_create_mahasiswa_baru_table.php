<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mahasiswa_baru}}`.
 */
class m201202_103212_create_mahasiswa_baru_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mahasiswa_baru}}', [
            'id' => $this->primaryKey(),
            'id_prodi' => $this->string(),
            'nik' => $this->string(),
            'nisn' => $this->string(),
            'no_ujian' => $this->string(),
            'nama_mahasiswa' => $this->string(),
            'jenis_kelamin' => $this->string(),
            'tinggi_badan' => $this->string(),
            'berat_badan' => $this->string(),
            'tempat_lahir' => $this->string(),
            'tanggal_lahir' => $this->string(),
            'nama_ibu_kandung' => $this->string(),
            'id_wilayah' => $this->string(),
            'jalan' => $this->string(),
            'rt' => $this->string(),
            'rw' => $this->string(),
            'dusun' => $this->string(),
            'kelurahan' => $this->string(),
            'kode_pos' => $this->string(),
            'handphone' => $this->string(),
            'telepon' => $this->string(),
            'kewarganegaraan' => $this->string(),
            'id_agama' => $this->string(),
            'penerima_kps' => $this->string(),
            'no_kps' => $this->string(),
            'id_mahasiswa' => $this->string(),
            'nim' => $this->string(),
            'id_jenis_daftar' => $this->string(),
            'id_jalur_daftar' => $this->string(),
            'id_periode_masuk' => $this->string(),
            'tanggal_daftar' => $this->string(),
            'id_perguruan_tinggi' => $this->string(),
            'file_skl' => $this->string(),
            'file_skbb' => $this->string(),
            'file_izin_bekerja' => $this->string(),
            'file_pas_foto' => $this->string(),
            'file_ktp' => $this->string(),
            'file_kk' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mahasiswa_baru}}');
    }
}
