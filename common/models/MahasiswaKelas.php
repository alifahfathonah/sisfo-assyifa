<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mahasiswa_kelas".
 *
 * @property int $id
 * @property int|null $kelas_id
 * @property int|null $mahasiswa_id
 * @property int|null $tahun_akademik_id
 * @property string $created_at
 *
 * @property Kelas $kelas
 * @property Mahasiswa $mahasiswa
 * @property TahunAkademik $tahunAkademik
 */
class MahasiswaKelas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mahasiswa_kelas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kelas_id', 'mahasiswa_id', 'tahun_akademik_id'], 'integer'],
            [['created_at'], 'safe'],
            [['kelas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kelas::className(), 'targetAttribute' => ['kelas_id' => 'id']],
            [['mahasiswa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mahasiswa::className(), 'targetAttribute' => ['mahasiswa_id' => 'id']],
            [['tahun_akademik_id'], 'exist', 'skipOnError' => true, 'targetClass' => TahunAkademik::className(), 'targetAttribute' => ['tahun_akademik_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kelas_id' => 'Kelas',
            'mahasiswa_id' => 'Mahasiswa',
            'tahun_akademik_id' => 'Tahun Akademik',
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
        return $this->hasOne(Kelas::className(), ['id' => 'kelas_id']);
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

    /**
     * Gets query for [[TahunAkademik]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTahunAkademik()
    {
        return $this->hasOne(TahunAkademik::className(), ['id' => 'tahun_akademik_id']);
    }
}
