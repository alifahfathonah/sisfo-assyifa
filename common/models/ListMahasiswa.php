<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "list_mahasiswa".
 *
 * @property int $id
 * @property string|null $nama_mahasiswa
 * @property string|null $jenis_kelamin
 * @property string|null $tanggal_lahir
 * @property string|null $id_perguruan_tinggi
 * @property string|null $id_mahasiswa
 * @property string|null $id_agama
 * @property string|null $nama_agama
 * @property string|null $id_prodi
 * @property string|null $nama_program_studi
 * @property string|null $nim
 * @property string|null $id_periode
 * @property string|null $nama_periode_masuk
 * @property string|null $id_registrasi_mahasiswa
 */
class ListMahasiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'list_mahasiswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_mahasiswa', 'jenis_kelamin', 'tanggal_lahir', 'id_perguruan_tinggi', 'id_mahasiswa', 'id_agama', 'nama_agama', 'id_prodi', 'nama_program_studi', 'nim', 'id_periode', 'nama_periode_masuk', 'id_registrasi_mahasiswa'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_mahasiswa' => 'Nama Mahasiswa',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tanggal_lahir' => 'Tanggal Lahir',
            'id_perguruan_tinggi' => 'Id Perguruan Tinggi',
            'id_mahasiswa' => 'Id Mahasiswa',
            'id_agama' => 'Id Agama',
            'nama_agama' => 'Nama Agama',
            'id_prodi' => 'Id Prodi',
            'nama_program_studi' => 'Nama Program Studi',
            'nim' => 'Nim',
            'id_periode' => 'Id Periode',
            'nama_periode_masuk' => 'Nama Periode Masuk',
            'id_registrasi_mahasiswa' => 'Id Registrasi Mahasiswa',
        ];
    }
}
