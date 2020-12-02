<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dosen_pengajar".
 *
 * @property int $id
 * @property string|null $id_aktivitas_mengajar
 * @property string|null $id_registrasi_dosen
 * @property string|null $id_dosen
 * @property string|null $nidn
 * @property string|null $nama_dosen
 * @property string|null $id_kelas_kuliah
 * @property string|null $nama_kelas_kuliah
 * @property string|null $id_subtansi
 * @property string|null $sks_subtansi_total
 * @property string|null $rencana_minggu_pertemuan
 * @property string|null $realisasi_minggu_pertemuan
 * @property string|null $id_jenis_evaluasi
 * @property string|null $nama_jenis_evaluasi
 */
class DosenPengajar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dosen_pengajar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_aktivitas_mengajar', 'id_registrasi_dosen', 'id_dosen', 'nidn', 'nama_dosen', 'id_kelas_kuliah', 'nama_kelas_kuliah', 'id_subtansi', 'sks_subtansi_total', 'rencana_minggu_pertemuan', 'realisasi_minggu_pertemuan', 'id_jenis_evaluasi', 'nama_jenis_evaluasi'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_aktivitas_mengajar' => 'Id Aktivitas Mengajar',
            'id_registrasi_dosen' => 'Id Registrasi Dosen',
            'id_dosen' => 'Id Dosen',
            'nidn' => 'Nidn',
            'nama_dosen' => 'Nama Dosen',
            'id_kelas_kuliah' => 'Id Kelas Kuliah',
            'nama_kelas_kuliah' => 'Nama Kelas Kuliah',
            'id_subtansi' => 'Id Subtansi',
            'sks_subtansi_total' => 'Sks Subtansi Total',
            'rencana_minggu_pertemuan' => 'Rencana Minggu Pertemuan',
            'realisasi_minggu_pertemuan' => 'Realisasi Minggu Pertemuan',
            'id_jenis_evaluasi' => 'Id Jenis Evaluasi',
            'nama_jenis_evaluasi' => 'Nama Jenis Evaluasi',
        ];
    }

    public function getKelasKuliah()
    {
        return $this->hasOne(KelasPerkuliahan::className(),['id_kelas_kuliah'=>'id_kelas_kuliah']);
    }
}
