<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "praktek".
 *
 * @property int $id
 * @property int|null $tahun_akademik_id
 * @property string|null $instansi
 * @property string|null $bulan
 * @property int|null $tahun
 * @property string $tanggal
 *
 * @property TahunAkademik $tahunAkademik
 * @property PraktekDosen[] $praktekDosens
 * @property PraktekFile[] $praktekFiles
 * @property PraktekMahasiswa[] $praktekMahasiswas
 */
class Praktek extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'praktek';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun_akademik_id', 'tahun'], 'integer'],
            [['tanggal'], 'safe'],
            [['instansi', 'bulan'], 'string', 'max' => 255],
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
            'instansi' => 'Instansi',
            'bulan' => 'Bulan',
            'tahun' => 'Tahun',
            'tanggal' => 'Tanggal',
        ];
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
     * Gets query for [[PraktekDosens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPraktekDosens()
    {
        return $this->hasMany(PraktekDosen::className(), ['praktek_id' => 'id']);
    }

    /**
     * Gets query for [[PraktekFiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(PraktekFile::className(), ['praktek_id' => 'id']);
    }

    /**
     * Gets query for [[PraktekMahasiswas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMahasiswas()
    {
        return $this->hasMany(Mahasiswa::className(),['id'=>'mahasiswa_id'])
        ->viaTable('praktek_mahasiswa', ['praktek_id' => 'id']);
    }
}
