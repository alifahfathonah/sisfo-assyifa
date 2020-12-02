<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "semester".
 *
 * @property int $id
 * @property string|null $id_semester
 * @property string|null $id_tahun_ajaran
 * @property string|null $nama_semester
 * @property string|null $semester
 * @property string|null $a_periode_aktif
 * @property string|null $tanggal_mulai
 * @property string|null $tanggal_selesai
 */
class Semester extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'semester';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_semester', 'id_tahun_ajaran', 'nama_semester', 'semester', 'a_periode_aktif', 'tanggal_mulai', 'tanggal_selesai'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_semester' => 'Id Semester',
            'id_tahun_ajaran' => 'Id Tahun Ajaran',
            'nama_semester' => 'Nama Semester',
            'semester' => 'Semester',
            'a_periode_aktif' => 'A Periode Aktif',
            'tanggal_mulai' => 'Tanggal Mulai',
            'tanggal_selesai' => 'Tanggal Selesai',
        ];
    }
}
