<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dosen_pengampuh".
 *
 * @property int $id
 * @property int|null $dosen_id
 * @property int|null $mata_kuliah_prodi_id
 * @property int|null $kelas_id
 * @property string $created_at
 *
 * @property Dosen $dosen
 * @property Kelas $kelas
 * @property MataKuliahProdi $mataKuliahProdi
 * @property Jadwal[] $jadwals
 * @property Materi[] $materis
 */
class DosenPengampuh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dosen_pengampuh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dosen_id', 'mata_kuliah_prodi_id', 'kelas_id'], 'integer'],
            [['created_at'], 'safe'],
            [['dosen_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['dosen_id' => 'id']],
            [['kelas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kelas::className(), 'targetAttribute' => ['kelas_id' => 'id']],
            [['mata_kuliah_prodi_id'], 'exist', 'skipOnError' => true, 'targetClass' => MataKuliahProdi::className(), 'targetAttribute' => ['mata_kuliah_prodi_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dosen_id' => 'Dosen',
            'mata_kuliah_prodi_id' => 'Mata Kuliah',
            'kelas_id' => 'Kelas ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Dosen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDosen()
    {
        return $this->hasOne(Dosen::className(), ['id' => 'dosen_id']);
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
     * Gets query for [[MataKuliahProdi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMataKuliahProdi()
    {
        return $this->hasOne(MataKuliahProdi::className(), ['id' => 'mata_kuliah_prodi_id']);
    }

    public function getMataKuliah()
    {
        return $this->hasOne(MataKuliah::className(), ['id' => 'mata_kuliah_id'])
          ->viaTable('mata_kuliah_prodi', ['id' => 'mata_kuliah_prodi_id']);
    }

    /**
     * Gets query for [[Jadwals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJadwals()
    {
        return $this->hasMany(Jadwal::className(), ['dosen_pengampuh_id' => 'id']);
    }

    /**
     * Gets query for [[Materis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMateris()
    {
        return $this->hasMany(Materi::className(), ['dosen_pengampuh_id' => 'id']);
    }
}
