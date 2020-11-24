<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "penilaian".
 *
 * @property int $id
 * @property int|null $jadwal_id
 * @property int|null $mahasiswa_id
 * @property string|null $nilai_angka
 * @property string|null $nilai_huruf
 *
 * @property Jadwal $jadwal
 * @property Mahasiswa $mahasiswa
 */
class Penilaian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penilaian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jadwal_id', 'mahasiswa_id'], 'integer'],
            [['nilai_angka', 'nilai_huruf'], 'string', 'max' => 255],
            [['jadwal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jadwal::className(), 'targetAttribute' => ['jadwal_id' => 'id']],
            [['mahasiswa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mahasiswa::className(), 'targetAttribute' => ['mahasiswa_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jadwal_id' => 'Jadwal ID',
            'mahasiswa_id' => 'Mahasiswa ID',
            'nilai_angka' => 'Nilai Angka',
            'nilai_huruf' => 'Nilai Huruf',
        ];
    }

    /**
     * Gets query for [[Jadwal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJadwal()
    {
        return $this->hasOne(Jadwal::className(), ['id' => 'jadwal_id']);
    }

    /**
     * Gets query for [[Mahasiswa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMahasiswa()
    {
        return $this->hasOne(Mahasiswa::className(), ['id' => 'mahasiswa_id']);
    }
}
