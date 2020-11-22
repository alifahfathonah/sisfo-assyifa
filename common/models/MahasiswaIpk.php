<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mahasiswa_ipk".
 *
 * @property int $id
 * @property string|null $id_registrasi_mahasiswa
 * @property string|null $id_mahasiswa
 * @property string|null $id_semester
 * @property string|null $nama_semester
 * @property string|null $nim
 * @property string|null $nama_mahasiswa
 * @property string|null $angkatan
 * @property string|null $id_prodi
 * @property string|null $nama_program_studi
 * @property string|null $id_status_mahasiswa
 * @property string|null $nama_status_mahasiswa
 * @property string|null $ips
 * @property string|null $ipk
 * @property string|null $sks_semester
 * @property string|null $sks_total
 * @property string|null $biaya_kuliah_smt
 */
class MahasiswaIpk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mahasiswa_ipk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_registrasi_mahasiswa', 'id_mahasiswa', 'id_semester', 'nama_semester', 'nim', 'nama_mahasiswa', 'angkatan', 'id_prodi', 'nama_program_studi', 'id_status_mahasiswa', 'nama_status_mahasiswa', 'ips', 'ipk', 'sks_semester', 'sks_total', 'biaya_kuliah_smt'], 'string', 'max' => 255],
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
            'id_mahasiswa' => 'Id Mahasiswa',
            'id_semester' => 'Id Semester',
            'nama_semester' => 'Nama Semester',
            'nim' => 'Nim',
            'nama_mahasiswa' => 'Nama Mahasiswa',
            'angkatan' => 'Angkatan',
            'id_prodi' => 'Id Prodi',
            'nama_program_studi' => 'Nama Program Studi',
            'id_status_mahasiswa' => 'Id Status Mahasiswa',
            'nama_status_mahasiswa' => 'Nama Status Mahasiswa',
            'ips' => 'Ips',
            'ipk' => 'Ipk',
            'sks_semester' => 'Sks Semester',
            'sks_total' => 'Sks Total',
            'biaya_kuliah_smt' => 'Biaya Kuliah Smt',
        ];
    }
}
