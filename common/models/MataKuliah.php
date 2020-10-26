<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mata_kuliah".
 *
 * @property int $id
 * @property string|null $kode
 * @property string|null $nama
 * @property string $created_at
 *
 * @property MataKuliahProdi[] $mataKuliahProdis
 */
class MataKuliah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mata_kuliah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['kode', 'nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode' => 'Kode',
            'nama' => 'Nama',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[MataKuliahProdis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMataKuliahProdis()
    {
        return $this->hasMany(MataKuliahProdi::className(), ['mata_kuliah_id' => 'id']);
    }

    public function getProdi()
    {
        return $this->hasOne(MataKuliahProdi::className(), ['mata_kuliah_id' => 'id']);
    }
}
