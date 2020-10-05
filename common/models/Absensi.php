<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "absensi".
 *
 * @property int $id
 * @property int|null $jadwal_id
 * @property int|null $pertemuan
 * @property string|null $tanggal
 * @property string $created_at
 *
 * @property Jadwal $jadwal
 * @property AbsensiMahasiswa[] $absensiMahasiswas
 */
class Absensi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'absensi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jadwal_id', 'pertemuan'], 'integer'],
            [['tanggal', 'created_at'], 'safe'],
            [['jadwal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jadwal::className(), 'targetAttribute' => ['jadwal_id' => 'id']],
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
            'pertemuan' => 'Pertemuan',
            'tanggal' => 'Tanggal',
            'created_at' => 'Created At',
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
     * Gets query for [[AbsensiMahasiswas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAbsensiMahasiswas()
    {
        return $this->hasMany(AbsensiMahasiswa::className(), ['absensi_id' => 'id']);
    }
}
