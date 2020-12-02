<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kelas_perkuliahan".
 *
 * @property int $id
 * @property string|null $id_kelas_kuliah
 * @property string|null $id_prodi
 * @property string|null $nama_program_studi
 * @property string|null $id_semester
 * @property string|null $nama_semester
 * @property string|null $id_matkul
 * @property string|null $kode_mata_kuliah
 * @property string|null $nama_mata_kuliah
 * @property string|null $nama_kelas_kuliah
 * @property string|null $sks
 * @property string|null $id_dosen
 * @property string|null $nama_dosen
 * @property string|null $jumlah_mahasiswa
 * @property string|null $apa_untuk_pditt
 */
class KelasPerkuliahan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelas_perkuliahan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kelas_kuliah', 'id_prodi', 'nama_program_studi', 'id_semester', 'nama_semester', 'id_matkul', 'kode_mata_kuliah', 'nama_mata_kuliah', 'nama_kelas_kuliah', 'sks', 'id_dosen', 'nama_dosen', 'jumlah_mahasiswa', 'apa_untuk_pditt'], 'string', 'max' => 255],
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
            'id_prodi' => 'Id Prodi',
            'nama_program_studi' => 'Nama Program Studi',
            'id_semester' => 'Id Semester',
            'nama_semester' => 'Nama Semester',
            'id_matkul' => 'Id Matkul',
            'kode_mata_kuliah' => 'Kode Mata Kuliah',
            'nama_mata_kuliah' => 'Nama Mata Kuliah',
            'nama_kelas_kuliah' => 'Nama Kelas Kuliah',
            'sks' => 'Sks',
            'id_dosen' => 'Id Dosen',
            'nama_dosen' => 'Nama Dosen',
            'jumlah_mahasiswa' => 'Jumlah Mahasiswa',
            'apa_untuk_pditt' => 'Apa Untuk Pditt',
        ];
    }

    public function getDosenPengajar()
    {
        return $this->hasMany(DosenPengajar::className(),['id_kelas_kuliah'=>'id_kelas_kuliah']);
    }

    public function getMahasiswas()
    {
        return $this->hasMany(PesertaKelasKuliah::className(),['id_kelas_kuliah'=>'id_kelas_kuliah']);
    }
}
