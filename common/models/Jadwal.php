<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jadwal".
 *
 * @property int $id
 * @property int|null $dosen_pengampuh_id
 * @property string|null $hari
 * @property string|null $waktu_mulai
 * @property string|null $waktu_selesai
 * @property string $created_at
 *
 * @property Absensi[] $absensis
 * @property DosenPengampuh $dosenPengampuh
 */
class Jadwal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jadwal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dosen_pengampuh_id'], 'integer'],
            [['waktu_mulai', 'waktu_selesai', 'created_at'], 'safe'],
            [['hari'], 'string', 'max' => 255],
            [['dosen_pengampuh_id'], 'exist', 'skipOnError' => true, 'targetClass' => DosenPengampuh::className(), 'targetAttribute' => ['dosen_pengampuh_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dosen_pengampuh_id' => 'Dosen Mata Kuliah',
            'hari' => 'Hari',
            'waktu_mulai' => 'Waktu Mulai',
            'waktu_selesai' => 'Waktu Selesai',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Absensis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAbsensis()
    {
        return $this->hasMany(Absensi::className(), ['jadwal_id' => 'id']);
    }

    public function getPenilaians()
    {
        return $this->hasMany(Penilaian::className(), ['jadwal_id' => 'id']);
    }

    /**
     * Gets query for [[DosenPengampuh]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDosenPengampuh()
    {
        return $this->hasOne(DosenPengampuh::className(), ['id' => 'dosen_pengampuh_id']);
    }

    public function getDosen()
    {
        return $this->hasOne(Dosen::className(), ['id' => 'dosen_id'])
          ->viaTable('dosen_pengampuh', ['id' => 'dosen_pengampuh_id']);
    }

    public function getMateries()
    {
        return $this->hasMany(Materi::className(), ['dosen_pengampuh_id' => 'id'])
          ->viaTable('dosen_pengampuh', ['id' => 'dosen_pengampuh_id']);
    }
}
