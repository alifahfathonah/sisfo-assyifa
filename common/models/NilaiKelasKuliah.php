<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "nilai_kelas_kuliah".
 *
 * @property int $id
 * @property string|null $id_registrasi_mahasiswa
 * @property string|null $id_kelas_kuliah
 * @property string|null $nilai_angka
 * @property string|null $nilai_indeks
 * @property string|null $nilai_huruf
 */
class NilaiKelasKuliah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nilai_kelas_kuliah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_registrasi_mahasiswa', 'id_kelas_kuliah', 'nilai_angka', 'nilai_indeks', 'nilai_huruf'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_registrasi_mahasiswa' => 'Id Registrasi Mahasiswa',
            'id_kelas_kuliah' => 'Id Kelas Kuliah',
            'nilai_angka' => 'Nilai Angka',
            'nilai_indeks' => 'Nilai Indeks',
            'nilai_huruf' => 'Nilai Huruf',
        ];
    }

    public function getMahasiswa()
    {
        return $this->hasOne(ListMahasiswa::className(),['id_registrasi_mahasiswa'=>'id_registrasi_mahasiswa']);
    }

    public function getKelasKuliah()
    {
        return $this->hasOne(KelasPerkuliahan::className(),['id_kelas_kuliah'=>'id_kelas_kuliah']);
    }
}
