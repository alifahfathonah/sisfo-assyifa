<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "riwayat_penelitian_dosen".
 *
 * @property int $id
 * @property string|null $id_dosen
 * @property string|null $nidn
 * @property string|null $nama_dosen
 * @property string|null $id_penelitian
 * @property string|null $judul_penelitian
 * @property string|null $id_kelompok_bidang
 * @property string|null $kode_kelompok_bidang
 * @property string|null $nama_kelompok_bidang
 * @property string|null $id_lembaga_iptek
 * @property string|null $nama_lembaga_iptek
 * @property string|null $tahun_kegiatan
 */
class RiwayatPenelitianDosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'riwayat_penelitian_dosen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_dosen', 'nidn', 'nama_dosen', 'id_penelitian', 'judul_penelitian', 'id_kelompok_bidang', 'kode_kelompok_bidang', 'nama_kelompok_bidang', 'id_lembaga_iptek', 'nama_lembaga_iptek', 'tahun_kegiatan'], 'string', 'max' => 255],
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
            'id_penelitian' => 'Id Penelitian',
            'judul_penelitian' => 'Judul Penelitian',
            'id_kelompok_bidang' => 'Id Kelompok Bidang',
            'kode_kelompok_bidang' => 'Kode Kelompok Bidang',
            'nama_kelompok_bidang' => 'Nama Kelompok Bidang',
            'id_lembaga_iptek' => 'Id Lembaga Iptek',
            'nama_lembaga_iptek' => 'Nama Lembaga Iptek',
            'tahun_kegiatan' => 'Tahun Kegiatan',
        ];
    }
}
