<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prodi".
 *
 * @property int $id
 * @property string|null $kode
 * @property string|null $nama
 * @property string|null $jenjang
 * @property string $created_at
 *
 * @property Kelas[] $kelas
 * @property MataKuliahProdi[] $mataKuliahProdis
 */
class Prodi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prodi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dosen_id'], 'integer'],
            [['created_at'], 'safe'],
            [['kode', 'nama', 'jenjang'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode' => 'Kode',
            'nama' => 'Nama',
            'jenjang' => 'Jenjang',
            'dosen_id' => 'Ka Prodi',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Kelas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKelas()
    {
        return $this->hasMany(Kelas::className(), ['prodi_id' => 'id']);
    }

    public function getDosen()
    {
        return $this->hasOne(Dosen::className(), ['id' => 'dosen_id']);
    }

    /**
     * Gets query for [[MataKuliahProdis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMataKuliahProdis()
    {
        return $this->hasMany(MataKuliahProdi::className(), ['prodi_id' => 'id']);
    }

    public function getMataKuliahs()
    {
        return $this->hasMany(MataKuliah::className(), ['id' => 'mata_kuliah_id'])
          ->viaTable('mata_kuliah_prodi', ['prodi_id' => 'id']);
    }

    public function getMahasiswas()
    {
        return $this->hasMany(Mahasiswa::className(), ['prodi_id' => 'id']);
    }
}
