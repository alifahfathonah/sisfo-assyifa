<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "riwayat_pangkat_dosen".
 *
 * @property int $id
 * @property string|null $id_dosen
 * @property string|null $nidn
 * @property string|null $nama_dosen
 * @property string|null $id_pangkat_golongan
 * @property string|null $nama_pangkat_golongan
 * @property string|null $sk_pangkat
 * @property string|null $tanggal_sk_pangkat
 * @property string|null $mulai_sk_pangkat
 * @property string|null $masa_kerja_dalam_tahun
 * @property string|null $masa_kerja_dalam_bulan
 */
class RiwayatPangkatDosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'riwayat_pangkat_dosen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_dosen', 'nidn', 'nama_dosen', 'id_pangkat_golongan', 'nama_pangkat_golongan', 'sk_pangkat', 'tanggal_sk_pangkat', 'mulai_sk_pangkat', 'masa_kerja_dalam_tahun', 'masa_kerja_dalam_bulan'], 'string', 'max' => 255],
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
            'id_pangkat_golongan' => 'Id Pangkat Golongan',
            'nama_pangkat_golongan' => 'Nama Pangkat Golongan',
            'sk_pangkat' => 'Sk Pangkat',
            'tanggal_sk_pangkat' => 'Tanggal Sk Pangkat',
            'mulai_sk_pangkat' => 'Mulai Sk Pangkat',
            'masa_kerja_dalam_tahun' => 'Masa Kerja Dalam Tahun',
            'masa_kerja_dalam_bulan' => 'Masa Kerja Dalam Bulan',
        ];
    }
}
