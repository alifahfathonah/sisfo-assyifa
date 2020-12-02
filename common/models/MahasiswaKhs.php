<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mahasiswa_khs".
 *
 * @property int $id
 * @property string|null $id_registrasi_mahasiswa
 * @property string|null $id_prodi
 * @property string|null $nama_program_studi
 * @property string|null $id_periode
 * @property string|null $id_matkul
 * @property string|null $nama_mata_kuliah
 * @property string|null $id_kelas
 * @property string|null $nama_kelas_kuliah
 * @property string|null $sks_mata_kuliah
 * @property string|null $nilai_angka
 * @property string|null $nilai_huruf
 * @property string|null $nilai_index
 * @property string|null $nim
 * @property string|null $nama_mahasiswa
 * @property string|null $angkatan
 */
class MahasiswaKhs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mahasiswa_khs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_registrasi_mahasiswa', 'id_prodi', 'nama_program_studi', 'id_periode', 'id_matkul', 'nama_mata_kuliah', 'id_kelas', 'nama_kelas_kuliah', 'sks_mata_kuliah', 'nilai_angka', 'nilai_huruf', 'nilai_indeks', 'nim', 'nama_mahasiswa', 'angkatan'], 'string', 'max' => 255],
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
            'id_prodi' => 'Id Prodi',
            'nama_program_studi' => 'Nama Program Studi',
            'id_periode' => 'Id Periode',
            'id_matkul' => 'Id Matkul',
            'nama_mata_kuliah' => 'Nama Mata Kuliah',
            'id_kelas' => 'Id Kelas',
            'nama_kelas_kuliah' => 'Nama Kelas Kuliah',
            'sks_mata_kuliah' => 'Sks Mata Kuliah',
            'nilai_angka' => 'Nilai Angka',
            'nilai_huruf' => 'Nilai Huruf',
            'nilai_indeks' => 'Nilai Indeks',
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
