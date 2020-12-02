<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jenis_pendaftaran".
 *
 * @property int $id
 * @property string|null $id_jenis_daftar
 * @property string|null $nama_jenis_daftar
 * @property string|null $untuk_daftar_sekolah
 */
class JenisPendaftaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_pendaftaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jenis_daftar', 'nama_jenis_daftar', 'untuk_daftar_sekolah'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_jenis_daftar' => 'Id Jenis Daftar',
            'nama_jenis_daftar' => 'Nama Jenis Daftar',
            'untuk_daftar_sekolah' => 'Untuk Daftar Sekolah',
        ];
    }
}
