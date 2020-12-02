<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kartu_ujian".
 *
 * @property int $id
 * @property string|null $id_semester
 * @property string|null $id_mahasiswa
 * @property string|null $status
 */
class KartuUjian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kartu_ujian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_semester', 'id_mahasiswa', 'status'], 'string', 'max' => 255],
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
            'id_mahasiswa' => 'Id Mahasiswa',
            'status' => 'Status',
        ];
    }

    function getMahasiswa()
    {
        return $this->hasOne(ListMahasiswa::className(),['id_mahasiswa'=>'id_mahasiswa']);
    }
}
