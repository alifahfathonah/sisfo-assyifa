<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prodi_nilai".
 *
 * @property int $id
 * @property int|null $prodi_id
 * @property string|null $nilai_huruf
 * @property float|null $nilai_index
 * @property float|null $bobot_min
 * @property float|null $bobot_max
 * @property string|null $tanggal_mulai
 * @property string|null $tanggal_akhir
 *
 * @property Prodi $prodi
 */
class ProdiNilai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prodi_nilai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prodi_id'], 'integer'],
            [['nilai_index', 'bobot_min', 'bobot_max'], 'number'],
            [['tanggal_mulai', 'tanggal_akhir'], 'safe'],
            [['nilai_huruf'], 'string', 'max' => 255],
            [['prodi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Prodi::className(), 'targetAttribute' => ['prodi_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prodi_id' => 'Prodi ID',
            'nilai_huruf' => 'Nilai Huruf',
            'nilai_index' => 'Nilai Index',
            'bobot_min' => 'Bobot Min',
            'bobot_max' => 'Bobot Max',
            'tanggal_mulai' => 'Tanggal Mulai',
            'tanggal_akhir' => 'Tanggal Akhir',
        ];
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
}
