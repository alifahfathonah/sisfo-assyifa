<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "aktivitas_mengajar_dosen".
 *
 * @property int $id
 * @property string|null $id_registrasi_dosen
 * @property string|null $id_dosen
 * @property string|null $nama_dosen
 * @property string|null $id_periode
 * @property string|null $nama_periode
 * @property string|null $id_prodi
 * @property string|null $nama_program_studi
 * @property string|null $id_matkul
 * @property string|null $nama_mata_kuliah
 * @property string|null $id_kelas
 * @property string|null $nama_kelas_kuliah
 * @property string|null $rencana_minggu_pertemuan
 * @property string|null $realisasi_minggu_pertemuan
 */
class AktivitasMengajarDosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aktivitas_mengajar_dosen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_registrasi_dosen', 'id_dosen', 'nama_dosen', 'id_periode', 'nama_periode', 'id_prodi', 'nama_program_studi', 'id_matkul', 'nama_mata_kuliah', 'id_kelas', 'nama_kelas_kuliah', 'rencana_minggu_pertemuan', 'realisasi_minggu_pertemuan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_registrasi_dosen' => 'Id Registrasi Dosen',
            'id_dosen' => 'Id Dosen',
            'nama_dosen' => 'Nama Dosen',
            'id_periode' => 'Id Periode',
            'nama_periode' => 'Nama Periode',
            'id_prodi' => 'Id Prodi',
            'nama_program_studi' => 'Nama Program Studi',
            'id_matkul' => 'Id Matkul',
            'nama_mata_kuliah' => 'Nama Mata Kuliah',
            'id_kelas' => 'Id Kelas',
            'nama_kelas_kuliah' => 'Nama Kelas Kuliah',
            'rencana_minggu_pertemuan' => 'Rencana Minggu Pertemuan',
            'realisasi_minggu_pertemuan' => 'Realisasi Minggu Pertemuan',
        ];
    }
}
