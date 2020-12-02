<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mahasiswa_krs".
 *
 * @property int $id
 * @property string|null $id_registrasi_mahasiswa
 * @property string|null $id_periode
 * @property string|null $id_prodi
 * @property string|null $nama_program_studi
 * @property string|null $id_matkul
 * @property string|null $kode_mata_kuliah
 * @property string|null $nama_mata_kuliah
 * @property string|null $id_kelas
 * @property string|null $nama_kelas_kuliah
 * @property string|null $sks_mata_kuliah
 * @property string|null $nim
 * @property string|null $nama_mahasiswa
 * @property string|null $angkatan
 */
class MahasiswaKrs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mahasiswa_krs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_registrasi_mahasiswa', 'id_periode', 'id_prodi', 'nama_program_studi', 'id_matkul', 'kode_mata_kuliah', 'nama_mata_kuliah', 'id_kelas', 'nama_kelas_kuliah', 'sks_mata_kuliah', 'nim', 'nama_mahasiswa', 'angkatan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_registrasi_mahasiswa' => 'Id Registrasi Mahasiswa',
            'id_periode' => 'Id Periode',
            'id_prodi' => 'Id Prodi',
            'nama_program_studi' => 'Nama Program Studi',
            'id_matkul' => 'Id Matkul',
            'kode_mata_kuliah' => 'Kode Mata Kuliah',
            'nama_mata_kuliah' => 'Nama Mata Kuliah',
            'id_kelas' => 'Id Kelas',
            'nama_kelas_kuliah' => 'Nama Kelas Kuliah',
            'sks_mata_kuliah' => 'Sks Mata Kuliah',
            'nim' => 'Nim',
            'nama_mahasiswa' => 'Nama Mahasiswa',
            'angkatan' => 'Angkatan',
        ];
    }

    public function getKelas()
    {
        return $this->hasOne(KelasPerkuliahan::className(),['id_kelas_kuliah'=>'id_kelas']);
    }
}
