<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "riwayat_fungsional_dosen".
 *
 * @property int $id
 * @property string|null $id_dosen
 * @property string|null $nidn
 * @property string|null $nama_dosen
 * @property string|null $id_jabatan_fungsional
 * @property string|null $nama_jabatan_fungsional
 * @property string|null $sk_jabatan_fungsional
 * @property string|null $mulai_sk_jabatan
 */
class RiwayatFungsionalDosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'riwayat_fungsional_dosen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_dosen', 'nidn', 'nama_dosen', 'id_jabatan_fungsional', 'nama_jabatan_fungsional', 'sk_jabatan_fungsional', 'mulai_sk_jabatan'], 'string', 'max' => 255],
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
            'id_jabatan_fungsional' => 'Id Jabatan Fungsional',
            'nama_jabatan_fungsional' => 'Nama Jabatan Fungsional',
            'sk_jabatan_fungsional' => 'Sk Jabatan Fungsional',
            'mulai_sk_jabatan' => 'Mulai Sk Jabatan',
        ];
    }
}
