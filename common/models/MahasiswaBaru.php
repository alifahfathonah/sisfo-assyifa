<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mahasiswa_baru".
 *
 * @property int $id
 * @property string|null $id_prodi
 * @property string|null $nik
 * @property string|null $nisn
 * @property string|null $no_ujian
 * @property string|null $nama_mahasiswa
 * @property string|null $jenis_kelamin
 * @property string|null $tinggi_badan
 * @property string|null $berat_badan
 * @property string|null $tempat_lahir
 * @property string|null $tanggal_lahir
 * @property string|null $nama_ibu_kandung
 * @property string|null $id_wilayah
 * @property string|null $jalan
 * @property string|null $rt
 * @property string|null $rw
 * @property string|null $dusun
 * @property string|null $kelurahan
 * @property string|null $kode_pos
 * @property string|null $handphone
 * @property string|null $telepon
 * @property string|null $kewarganegaraan
 * @property string|null $id_agama
 * @property string|null $penerima_kps
 * @property string|null $no_kps
 * @property string|null $id_mahasiswa
 * @property string|null $nim
 * @property string|null $id_jenis_daftar
 * @property string|null $id_jalur_daftar
 * @property string|null $id_periode_masuk
 * @property string|null $tanggal_daftar
 * @property string|null $id_perguruan_tinggi
 * @property string|null $file_skl
 * @property string|null $file_skbb
 * @property string|null $file_izin_bekerja
 * @property string|null $file_pas_foto
 * @property string|null $file_ktp
 * @property string|null $file_kk
 */
class MahasiswaBaru extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mahasiswa_baru';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_prodi', 'nik', 'nama_mahasiswa', 'jenis_kelamin', 'tinggi_badan', 'berat_badan', 'tempat_lahir', 'tanggal_lahir', 'nama_ibu_kandung', 'id_wilayah', 'kewarganegaraan', 'id_agama', 'penerima_kps','kelurahan', 'id_jalur_daftar', 'id_periode_masuk'], 'required'],
            [['id_prodi', 'nisn', 'no_ujian', 'nama_mahasiswa', 'jenis_kelamin', 'tinggi_badan', 'berat_badan', 'tempat_lahir', 'tanggal_lahir', 'nama_ibu_kandung', 'id_wilayah', 'jalan', 'rt', 'rw', 'dusun', 'kelurahan', 'kode_pos', 'handphone', 'telepon', 'kewarganegaraan', 'id_agama', 'penerima_kps', 'no_kps', 'id_mahasiswa', 'nim', 'id_jenis_daftar', 'id_jalur_daftar', 'id_periode_masuk', 'tanggal_daftar', 'id_perguruan_tinggi'], 'string', 'max' => 255],
            ['nik','string','min'=>16,'max'=>16],
            [['file_skl', 'file_skbb', 'file_pas_foto', 'file_ktp', 'file_kk'],'file','skipOnEmpty'=>true,'extensions'=>'jpeg, jpg, png'],
            [['file_izin_bekerja'],'file','skipOnEmpty'=>true,'extensions'=>'jpeg, jpg, png']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_prodi' => 'Program Studi',
            'nik' => 'Nik',
            'nisn' => 'Nisn',
            'no_ujian' => 'No Ujian',
            'nama_mahasiswa' => 'Nama Mahasiswa',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tinggi_badan' => 'Tinggi Badan',
            'berat_badan' => 'Berat Badan',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'nama_ibu_kandung' => 'Nama Ibu Kandung',
            'id_wilayah' => 'Wilayah',
            'jalan' => 'Jalan',
            'rt' => 'Rt',
            'rw' => 'Rw',
            'dusun' => 'Dusun',
            'kelurahan' => 'Kelurahan',
            'kode_pos' => 'Kode Pos',
            'handphone' => 'Handphone',
            'telepon' => 'Telepon',
            'kewarganegaraan' => 'Kewarganegaraan',
            'id_agama' => 'Agama',
            'penerima_kps' => 'Penerima Kps',
            'no_kps' => 'No Kps',
            'id_mahasiswa' => 'Id Mahasiswa',
            'nim' => 'Nim',
            'id_jenis_daftar' => 'Id Jenis Daftar',
            'id_jalur_daftar' => 'Jalur Daftar',
            'id_periode_masuk' => 'Periode Masuk',
            'tanggal_daftar' => 'Tanggal Daftar',
            'id_perguruan_tinggi' => 'Id Perguruan Tinggi',
            'file_skl' => 'File Skl',
            'file_skbb' => 'File Skbb',
            'file_izin_bekerja' => 'File Izin Bekerja',
            'file_pas_foto' => 'File Pas Foto',
            'file_ktp' => 'File Ktp',
            'file_kk' => 'File Kk',
        ];
    }

    function getProdi()
    {
        return $this->hasOne(ListProdi::className(),['id_prodi'=>'id_prodi']);
    }
}
