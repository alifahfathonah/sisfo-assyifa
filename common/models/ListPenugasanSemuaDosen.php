<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "list_penugasan_semua_dosen".
 *
 * @property int $id
 * @property string|null $id_registrasi_dosen
 * @property string|null $id_dosen
 * @property string|null $nama_dosen
 * @property string|null $nidn
 * @property string|null $jenis_kelamin
 * @property string|null $id_tahun_ajaran
 * @property string|null $id_prodi
 * @property string|null $program_studi
 * @property string|null $nomor_surat_tugas
 * @property string|null $tanggal_surat_tugas
 * @property string|null $apakah_homebase
 */
class ListPenugasanSemuaDosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'list_penugasan_semua_dosen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_registrasi_dosen', 'id_dosen', 'nama_dosen', 'nidn', 'jenis_kelamin', 'id_tahun_ajaran', 'id_prodi', 'program_studi', 'nomor_surat_tugas', 'tanggal_surat_tugas', 'apakah_homebase'], 'string', 'max' => 255],
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
            'jenis_kelamin' => 'Jenis Kelamin',
            'id_tahun_ajaran' => 'Id Tahun Ajaran',
            'id_prodi' => 'Id Prodi',
            'program_studi' => 'Program Studi',
            'nomor_surat_tugas' => 'Nomor Surat Tugas',
            'tanggal_surat_tugas' => 'Tanggal Surat Tugas',
            'apakah_homebase' => 'Apakah Homebase',
        ];
    }
}
