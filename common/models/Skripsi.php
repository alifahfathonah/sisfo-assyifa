<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "skripsi".
 *
 * @property int $id
 * @property int|null $tahun_akademik_id
 *
 * @property TahunAkademik $tahunAkademik
 * @property SkripsiMahasiswa[] $skripsiMahasiswas
 */
class Skripsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'skripsi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun_akademik_id'], 'integer'],
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
     * Gets query for [[SkripsiMahasiswas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSkripsiMahasiswas()
    {
        return $this->hasMany(SkripsiMahasiswa::className(), ['skripsi_id' => 'id']);
    }
}
