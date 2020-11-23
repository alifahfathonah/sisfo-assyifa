<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "list_dosen".
 *
 * @property int $id
 * @property string|null $id_dosen
 * @property string|null $nama_dosen
 * @property string|null $nidn
 * @property string|null $nip
 * @property string|null $jenis_kelamin
 * @property string|null $id_agama
 * @property string|null $nama_agama
 * @property string|null $tanggal_lahir
 * @property string|null $id_status_aktif
 * @property string|null $nama_status_aktif
 */
class ListDosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'list_dosen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_dosen', 'nama_dosen', 'nidn', 'nip', 'jenis_kelamin', 'id_agama', 'nama_agama', 'tanggal_lahir', 'id_status_aktif', 'nama_status_aktif'], 'string', 'max' => 255],
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
            'nidn' => 'Nidn',
            'nip' => 'Nip',
            'jenis_kelamin' => 'Jenis Kelamin',
            'id_agama' => 'Id Agama',
            'nama_agama' => 'Nama Agama',
            'tanggal_lahir' => 'Tanggal Lahir',
            'id_status_aktif' => 'Id Status Aktif',
            'nama_status_aktif' => 'Nama Status Aktif',
        ];
    }
}
