<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "list_prodi".
 *
 * @property int $id
 * @property string|null $id_prodi
 * @property string|null $kode_program_studi
 * @property string|null $nama_program_studi
 * @property string|null $status
 * @property string|null $id_jenjang_pendidikan
 * @property string|null $nama_jenjang_pendidikan
 */
class ListProdi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'list_prodi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_prodi', 'kode_program_studi', 'nama_program_studi', 'status', 'id_jenjang_pendidikan', 'nama_jenjang_pendidikan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_prodi' => 'Id Prodi',
            'kode_program_studi' => 'Kode Program Studi',
            'nama_program_studi' => 'Nama Program Studi',
            'status' => 'Status',
            'id_jenjang_pendidikan' => 'Id Jenjang Pendidikan',
            'nama_jenjang_pendidikan' => 'Nama Jenjang Pendidikan',
        ];
    }
}
