<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "peserta_kelas_kuliah".
 *
 * @property int $id
 * @property string|null $id_kelas_kuliah
 * @property string|null $id_registrasi_mahasiswa
 * @property string|null $id_mahasiswa
 * @property string|null $nim
 * @property string|null $nama_mahasiswa
 * @property string|null $id_matkul
 * @property string|null $kode_mata_kuliah
 * @property string|null $nama_mata_kuliah
 * @property string|null $id_prodi
 * @property string|null $nama_program_studi
 * @property string|null $angkatan
 */
class PesertaKelasKuliah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peserta_kelas_kuliah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kelas_kuliah', 'id_registrasi_mahasiswa', 'id_mahasiswa', 'nim', 'nama_mahasiswa', 'id_matkul', 'kode_mata_kuliah', 'nama_mata_kuliah', 'id_prodi', 'nama_program_studi', 'angkatan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kelas_kuliah' => 'Id Kelas Kuliah',
            'id_registrasi_mahasiswa' => 'Id Registrasi Mahasiswa',
            'id_mahasiswa' => 'Id Mahasiswa',
            'nim' => 'Nim',
            'nama_mahasiswa' => 'Nama Mahasiswa',
            'id_matkul' => 'Id Matkul',
            'kode_mata_kuliah' => 'Kode Mata Kuliah',
            'nama_mata_kuliah' => 'Nama Mata Kuliah',
            'id_prodi' => 'Id Prodi',
            'nama_program_studi' => 'Nama Program Studi',
            'angkatan' => 'Angkatan',
        ];
    }
}
