<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tahun_akademik".
 *
 * @property int $id
 * @property int|null $tahun
 * @property int|null $periode
 * @property string|null $status
 *
 * @property Kelas[] $kelas
 * @property MahasiswaKelas[] $mahasiswaKelas
 * @property MataKuliahProdi[] $mataKuliahProdis
 */
class TahunAkademik extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tahun_akademik';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun', 'periode', 'status'], 'required'],
            [['tahun', 'periode','status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tahun' => 'Tahun',
            'periode' => 'Periode',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Kelas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKelas()
    {
        return $this->hasMany(Kelas::className(), ['tahun_akademik_id' => 'id']);
    }

    /**
     * Gets query for [[MahasiswaKelas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMahasiswaKelas()
    {
        return $this->hasMany(MahasiswaKelas::className(), ['tahun_akademik_id' => 'id']);
    }

    /**
     * Gets query for [[MataKuliahProdis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMataKuliahProdis()
    {
        return $this->hasMany(MataKuliahProdi::className(), ['tahun_akademik_id' => 'id']);
    }
}
