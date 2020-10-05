<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "absensi_mahasiswa".
 *
 * @property int $id
 * @property int|null $absensi_id
 * @property int|null $mahasiswa_id
 * @property string|null $status
 * @property string|null $keterangan
 *
 * @property Absensi $absensi
 * @property Mahasiswa $mahasiswa
 */
class AbsensiMahasiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'absensi_mahasiswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['absensi_id', 'mahasiswa_id'], 'integer'],
            [['status', 'keterangan'], 'string', 'max' => 255],
            [['absensi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Absensi::className(), 'targetAttribute' => ['absensi_id' => 'id']],
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
            'absensi_id' => 'Absensi ID',
            'mahasiswa_id' => 'Mahasiswa ID',
            'status' => 'Status',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * Gets query for [[Absensi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAbsensi()
    {
        return $this->hasOne(Absensi::className(), ['id' => 'absensi_id']);
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
