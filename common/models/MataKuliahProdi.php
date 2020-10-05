<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mata_kuliah_prodi".
 *
 * @property int $id
 * @property int|null $mata_kuliah_id
 * @property int|null $prodi_id
 * @property int|null $semester
 * @property string|null $status
 * @property int|null $bobo_sks
 * @property int|null $tahun_akademik_id
 * @property string $created_at
 *
 * @property DosenPengampuh[] $dosenPengampuhs
 * @property MataKuliah $mataKuliah
 * @property Prodi $prodi
 * @property TahunAkademik $tahunAkademik
 */
class MataKuliahProdi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mata_kuliah_prodi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mata_kuliah_id', 'prodi_id', 'semester', 'bobot_sks', 'tahun_akademik_id'], 'integer'],
            [['created_at'], 'safe'],
            [['status'], 'string', 'max' => 255],
            [['mata_kuliah_id'], 'exist', 'skipOnError' => true, 'targetClass' => MataKuliah::className(), 'targetAttribute' => ['mata_kuliah_id' => 'id']],
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
            'mata_kuliah_id' => 'Mata Kuliah',
            'prodi_id' => 'Prodi',
            'semester' => 'Semester',
            'status' => 'Status',
            'bobot_sks' => 'Bobot SKS',
            'tahun_akademik_id' => 'Tahun Akademik',
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
        return $this->hasMany(DosenPengampuh::className(), ['mata_kuliah_prodi_id' => 'id']);
    }

    /**
     * Gets query for [[MataKuliah]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMataKuliah()
    {
        return $this->hasOne(MataKuliah::className(), ['id' => 'mata_kuliah_id']);
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
}
