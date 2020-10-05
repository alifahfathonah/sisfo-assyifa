<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vw_jadwal".
 *
 * @property int|null $dosen_id
 * @property int $jadwal_id
 * @property int $mata_kuliah_prodi_id
 * @property int $mata_kuliah_id
 * @property string|null $nama_dosen
 * @property string|null $hari
 * @property string|null $waktu_mulai
 * @property string|null $waktu_selesai
 * @property string|null $nama_mata_kuliah
 * @property int|null $tahun_akademik_id
 * @property int|null $semester
 * @property int|null $bobot_sks
 */
class VwJadwal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vw_jadwal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dosen_id', 'jadwal_id', 'mata_kuliah_prodi_id', 'mata_kuliah_id', 'tahun_akademik_id', 'semester', 'bobot_sks'], 'integer'],
            [['waktu_mulai', 'waktu_selesai'], 'safe'],
            [['nama_dosen', 'hari', 'nama_mata_kuliah'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dosen_id' => 'Dosen ID',
            'jadwal_id' => 'Jadwal ID',
            'mata_kuliah_prodi_id' => 'Mata Kuliah Prodi ID',
            'mata_kuliah_id' => 'Mata Kuliah ID',
            'nama_dosen' => 'Nama Dosen',
            'hari' => 'Hari',
            'waktu_mulai' => 'Waktu Mulai',
            'waktu_selesai' => 'Waktu Selesai',
            'nama_mata_kuliah' => 'Nama Mata Kuliah',
            'tahun_akademik_id' => 'Tahun Akademik ID',
            'semester' => 'Semester',
            'bobot_sks' => 'Bobot Sks',
        ];
    }

    public function getKelas()
    {
        return $this->hasOne(Kelas::className(), ['id' => 'kelas_id']);
    }
}
