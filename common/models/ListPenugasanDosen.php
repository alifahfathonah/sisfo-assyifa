<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "list_penugasan_dosen".
 *
 * @property int $id
 * @property string|null $id_registrasi_dosen
 * @property string|null $id_dosen
 * @property string|null $nama_dosen
 * @property string|null $nidn
 * @property string|null $id_tahun_ajaran
 * @property string|null $nama_tahun_ajaran
 * @property string|null $id_perguruan_tinggi
 * @property string|null $nama_perguruan_tinggi
 * @property string|null $id_prodi
 * @property string|null $nama_program_studi
 * @property string|null $nomor_surat_tugas
 * @property string|null $tanggal_surat_tugas
 * @property string|null $mulai_surat_tugas
 */
class ListPenugasanDosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'list_penugasan_dosen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_registrasi_dosen', 'id_dosen', 'nama_dosen', 'nidn', 'id_tahun_ajaran', 'nama_tahun_ajaran', 'id_perguruan_tinggi', 'nama_perguruan_tinggi', 'id_prodi', 'nama_program_studi', 'nomor_surat_tugas', 'tanggal_surat_tugas', 'mulai_surat_tugas'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_registrasi_dosen' => 'Id Registrasi Dosen',
            'id_dosen' => 'Id Dosen',
            'nama_dosen' => 'Nama Dosen',
            'nidn' => 'Nidn',
            'id_tahun_ajaran' => 'Id Tahun Ajaran',
            'nama_tahun_ajaran' => 'Nama Tahun Ajaran',
            'id_perguruan_tinggi' => 'Id Perguruan Tinggi',
            'nama_perguruan_tinggi' => 'Nama Perguruan Tinggi',
            'id_prodi' => 'Id Prodi',
            'nama_program_studi' => 'Nama Program Studi',
            'nomor_surat_tugas' => 'Nomor Surat Tugas',
            'tanggal_surat_tugas' => 'Tanggal Surat Tugas',
            'mulai_surat_tugas' => 'Mulai Surat Tugas',
        ];
    }
}
