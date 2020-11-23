<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "detail_biodata_dosen".
 *
 * @property int $id
 * @property string|null $id_dosen
 * @property string|null $nama_dosen
 * @property string|null $tempat_lahir
 * @property string|null $tanggal_lahir
 * @property string|null $jenis_kelamin
 * @property string|null $id_agama
 * @property string|null $nama_agama
 * @property string|null $id_status_aktif
 * @property string|null $nama_status_aktif
 * @property string|null $nidn
 * @property string|null $nama_ibu
 * @property string|null $nik
 * @property string|null $nip
 * @property string|null $npwp
 * @property string|null $id_jenis_sdm
 * @property string|null $no_sk_cpns
 * @property string|null $tanggal_sk_cpns
 * @property string|null $no_sk_pengangkatan
 * @property string|null $mulai_sk_pengangkatan
 * @property string|null $id_lembaga_pengangkatan
 * @property string|null $nama_lembaga_pengangkatan
 * @property string|null $id_pangkat_golongan
 * @property string|null $nama_pangkat_golongan
 * @property string|null $id_sumber_gaji
 * @property string|null $jalan
 * @property string|null $dusun
 * @property string|null $rt
 * @property string|null $rw
 * @property string|null $ds_kel
 * @property string|null $kode_pos
 * @property string|null $id_wilayah
 * @property string|null $nama_wilayah
 * @property string|null $telepon
 * @property string|null $handphone
 * @property string|null $email
 * @property string|null $status_pernikahan
 * @property string|null $nama_suami_istri
 * @property string|null $nip_suami_istri
 * @property string|null $tanggal_mulai_pns
 * @property string|null $id_pekerjaan_suami_istri
 * @property string|null $nama_pekerjaan_suami_istri
 */
class DetailBiodataDosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_biodata_dosen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_dosen', 'nama_dosen', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'id_agama', 'nama_agama', 'id_status_aktif', 'nama_status_aktif', 'nidn', 'nama_ibu', 'nik', 'nip', 'npwp', 'id_jenis_sdm', 'no_sk_cpns', 'tanggal_sk_cpns', 'no_sk_pengangkatan', 'mulai_sk_pengangkatan', 'id_lembaga_pengangkatan', 'nama_lembaga_pengangkatan', 'id_pangkat_golongan', 'nama_pangkat_golongan', 'id_sumber_gaji', 'jalan', 'dusun', 'rt', 'rw', 'ds_kel', 'kode_pos', 'id_wilayah', 'nama_wilayah', 'telepon', 'handphone', 'email', 'status_pernikahan', 'nama_suami_istri', 'nip_suami_istri', 'tanggal_mulai_pns', 'id_pekerjaan_suami_istri', 'nama_pekerjaan_suami_istri'], 'string', 'max' => 255],
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
            'nama_dosen' => 'Nama Dosen',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'id_agama' => 'Id Agama',
            'nama_agama' => 'Nama Agama',
            'id_status_aktif' => 'Id Status Aktif',
            'nama_status_aktif' => 'Nama Status Aktif',
            'nidn' => 'Nidn',
            'nama_ibu' => 'Nama Ibu',
            'nik' => 'Nik',
            'nip' => 'Nip',
            'npwp' => 'Npwp',
            'id_jenis_sdm' => 'Id Jenis Sdm',
            'no_sk_cpns' => 'No Sk Cpns',
            'tanggal_sk_cpns' => 'Tanggal Sk Cpns',
            'no_sk_pengangkatan' => 'No Sk Pengangkatan',
            'mulai_sk_pengangkatan' => 'Mulai Sk Pengangkatan',
            'id_lembaga_pengangkatan' => 'Id Lembaga Pengangkatan',
            'nama_lembaga_pengangkatan' => 'Nama Lembaga Pengangkatan',
            'id_pangkat_golongan' => 'Id Pangkat Golongan',
            'nama_pangkat_golongan' => 'Nama Pangkat Golongan',
            'id_sumber_gaji' => 'Id Sumber Gaji',
            'jalan' => 'Jalan',
            'dusun' => 'Dusun',
            'rt' => 'Rt',
            'rw' => 'Rw',
            'ds_kel' => 'Ds Kel',
            'kode_pos' => 'Kode Pos',
            'id_wilayah' => 'Id Wilayah',
            'nama_wilayah' => 'Nama Wilayah',
            'telepon' => 'Telepon',
            'handphone' => 'Handphone',
            'email' => 'Email',
            'status_pernikahan' => 'Status Pernikahan',
            'nama_suami_istri' => 'Nama Suami Istri',
            'nip_suami_istri' => 'Nip Suami Istri',
            'tanggal_mulai_pns' => 'Tanggal Mulai Pns',
            'id_pekerjaan_suami_istri' => 'Id Pekerjaan Suami Istri',
            'nama_pekerjaan_suami_istri' => 'Nama Pekerjaan Suami Istri',
        ];
    }
}
