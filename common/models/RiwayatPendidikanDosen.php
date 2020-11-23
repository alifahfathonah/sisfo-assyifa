<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "riwayat_pendidikan_dosen".
 *
 * @property int $id
 * @property string|null $id_dosen
 * @property string|null $nidn
 * @property string|null $nama_dosen
 * @property string|null $id_bidang_studi
 * @property string|null $nama_bidang_studi
 * @property string|null $id_jenjang_pendidikan
 * @property string|null $nama_jenjang_pendidikan
 * @property string|null $id_gelar_akademik
 * @property string|null $nama_gelar_akademik
 * @property string|null $id_perguruan_tinggi
 * @property string|null $nama_perguruan_tinggi
 * @property string|null $fakultas
 * @property string|null $tahun_lulus
 * @property string|null $sks_lulus
 * @property string|null $ipk
 */
class RiwayatPendidikanDosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'riwayat_pendidikan_dosen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_dosen', 'nidn', 'nama_dosen', 'id_bidang_studi', 'nama_bidang_studi', 'id_jenjang_pendidikan', 'nama_jenjang_pendidikan', 'id_gelar_akademik', 'nama_gelar_akademik', 'id_perguruan_tinggi', 'nama_perguruan_tinggi', 'fakultas', 'tahun_lulus', 'sks_lulus', 'ipk'], 'string', 'max' => 255],
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
            'id_bidang_studi' => 'Id Bidang Studi',
            'nama_bidang_studi' => 'Nama Bidang Studi',
            'id_jenjang_pendidikan' => 'Id Jenjang Pendidikan',
            'nama_jenjang_pendidikan' => 'Nama Jenjang Pendidikan',
            'id_gelar_akademik' => 'Id Gelar Akademik',
            'nama_gelar_akademik' => 'Nama Gelar Akademik',
            'id_perguruan_tinggi' => 'Id Perguruan Tinggi',
            'nama_perguruan_tinggi' => 'Nama Perguruan Tinggi',
            'fakultas' => 'Fakultas',
            'tahun_lulus' => 'Tahun Lulus',
            'sks_lulus' => 'Sks Lulus',
            'ipk' => 'Ipk',
        ];
    }
}
