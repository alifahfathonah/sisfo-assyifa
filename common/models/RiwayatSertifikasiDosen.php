<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "riwayat_sertifikasi_dosen".
 *
 * @property int $id
 * @property string|null $id_dosen
 * @property string|null $nidn
 * @property string|null $nama_dosen
 * @property string|null $nomor_peserta
 * @property string|null $id_bidang_studi
 * @property string|null $nama_bidang_studi
 * @property string|null $id_jenis_sertifikasi
 * @property string|null $nama_jenis_sertifikasi
 * @property string|null $tahun_sertifikasi
 * @property string|null $sk_sertifikasi
 */
class RiwayatSertifikasiDosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'riwayat_sertifikasi_dosen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_dosen', 'nidn', 'nama_dosen', 'nomor_peserta', 'id_bidang_studi', 'nama_bidang_studi', 'id_jenis_sertifikasi', 'nama_jenis_sertifikasi', 'tahun_sertifikasi', 'sk_sertifikasi'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_dosen' => 'Id Dosen',
            'nidn' => 'Nidn',
            'nama_dosen' => 'Nama Dosen',
            'nomor_peserta' => 'Nomor Peserta',
            'id_bidang_studi' => 'Id Bidang Studi',
            'nama_bidang_studi' => 'Nama Bidang Studi',
            'id_jenis_sertifikasi' => 'Id Jenis Sertifikasi',
            'nama_jenis_sertifikasi' => 'Nama Jenis Sertifikasi',
            'tahun_sertifikasi' => 'Tahun Sertifikasi',
            'sk_sertifikasi' => 'Sk Sertifikasi',
        ];
    }
}
