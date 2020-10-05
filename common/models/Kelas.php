<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kelas".
 *
 * @property int $id
 * @property int|null $tahun_akademik_id
 * @property int|null $prodi_id
 * @property string|null $kode
 * @property string|null $nama
 * @property int|null $semester
 * @property string $created_at
 *
 * @property DosenPengampuh[] $dosenPengampuhs
 * @property Prodi $prodi
 * @property TahunAkademik $tahunAkademik
 * @property MahasiswaKelas[] $mahasiswaKelas
 */
class Kelas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun_akademik_id', 'prodi_id', 'semester'], 'integer'],
            [['created_at'], 'safe'],
            [['kode', 'nama'], 'string', 'max' => 255],
            [['prodi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Prodi::className(), 'targetAttribute' => ['prodi_id' => 'id']],
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
            'tahun_akademik_id' => 'Tahun Akademik',
            'prodi_id' => 'Program Studi',
            'kode' => 'Kode',
            'nama' => 'Nama',
            'semester' => 'Semester',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[DosenPengampuhs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDosenPengampuhs()
    {
        return $this->hasMany(DosenPengampuh::className(), ['kelas_id' => 'id']);
    }

    /**
     * Gets query for [[Prodi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdi()
    {
        return $this->hasOne(Prodi::className(), ['id' => 'prodi_id']);
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

    /**
     * Gets query for [[MahasiswaKelas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMahasiswaKelas()
    {
        return $this->hasMany(MahasiswaKelas::className(), ['kelas_id' => 'id']);
    }

    public function getMahasiswas()
    {
        return $this->hasMany(Mahasiswa::className(), ['id' => 'mahasiswa_id'])
          ->viaTable('mahasiswa_kelas', ['kelas_id' => 'id']);
    }

    public function getJadwals()
    {
        return $this->hasMany(Jadwal::className(), ['dosen_pengampuh_id' => 'id'])
          ->viaTable('dosen_pengampuh', ['kelas_id' => 'id']);
    }
}
