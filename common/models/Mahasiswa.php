<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mahasiswa".
 *
 * @property int $id
 * @property string|null $NIK
 * @property string|null $nama
 * @property string|null $jenis_kelamin
 * @property string|null $status
 * @property int|null $user_id
 * @property string $created_at
 *
 * @property AbsensiMahasiswa[] $absensiMahasiswas
 * @property User $user
 * @property MahasiswaKelas[] $mahasiswaKelas
 */
class Mahasiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mahasiswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id','prodi_id'], 'integer'],
            [['created_at'], 'safe'],
            [['NIM'],'unique'],
            [['NIM', 'nama', 'jenis_kelamin', 'status'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'NIM' => 'NIM',
            'nama' => 'Nama',
            'jenis_kelamin' => 'Jenis Kelamin',
            'status' => 'Status',
            'user_id' => 'User ID',
            'prodi_id' => 'Prodi',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[AbsensiMahasiswas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAbsensiMahasiswas()
    {
        return $this->hasMany(AbsensiMahasiswa::className(), ['mahasiswa_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[MahasiswaKelas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMahasiswaKelas()
    {
        return $this->hasMany(MahasiswaKelas::className(), ['mahasiswa_id' => 'id']);
    }

    public function getKelas()
    {
        return $this->hasOne(Kelas::className(), ['id' => 'kelas_id'])
                ->viaTable('mahasiswa_kelas',['mahasiswa_id'=>'id']);
    }
    
    public function getAngkatan()
    {
        return $this->hasOne(Angkatan::className(), ['id' => 'angkatan_id'])
                ->viaTable('mahasiswa_angkatan',['mahasiswa_id'=>'id']);
    }

    public function getProdi()
    {
        return $this->hasOne(Prodi::className(), ['id' => 'prodi_id']);
    }

    public function getPembimbings()
    {
        return $this->hasMany(Dosen::className(), ['id' => 'dosen_id'])
                ->viaTable('dosen_pembimbing',['mahasiswa_id'=>'id']);
    }

    public function getDosenPembimbings()
    {
        return $this->hasMany(DosenPembimbing::className(), ['mahasiswa_id'=>'id']);
    }

    public function getSkripsi()
    {
        return $this->hasOne(SkripsiMahasiswa::className(),['mahasiswa_id'=>'id']);
    }

    public function getPengajuanSkripsi()
    {
        return $this->hasMany(PengajuanSkripsi::className(),['mahasiswa_id'=>'id']);
    }

    public function getAccPengajuan()
    {
        return $this->hasOne(PengajuanSkripsi::className(),['mahasiswa_id'=>'id'])->where(['status'=>'ACC'])->one();
    }

    public function getSeminars()
    {
        return $this->hasMany(Seminar::className(),['mahasiswa_id'=>'id']);
    }
}
