<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "materi".
 *
 * @property int $id
 * @property int|null $dosen_pengampuh_id
 * @property string|null $judul
 * @property string|null $konten
 * @property string|null $status
 * @property int|null $no_urut
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property DosenPengampuh $dosenPengampuh
 */
class Materi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'materi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dosen_pengampuh_id', 'no_urut'], 'integer'],
            [['konten'], 'string'],
            [['tipe_konten','created_at', 'updated_at'], 'safe'],
            [['judul', 'status', 'tipe'], 'string', 'max' => 255],
            [['dosen_pengampuh_id'], 'exist', 'skipOnError' => true, 'targetClass' => DosenPengampuh::className(), 'targetAttribute' => ['dosen_pengampuh_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dosen_pengampuh_id' => 'Dosen Mata Kuliah',
            'judul' => 'Judul',
            'konten' => 'Konten',
            'status' => 'Status',
            'no_urut' => 'No Urut',
            'tipe' => 'Tipe',
            'tipe_konten' => 'Tipe Konten',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[DosenPengampuh]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDosenPengampuh()
    {
        return $this->hasOne(DosenPengampuh::className(), ['id' => 'dosen_pengampuh_id']);
    }

    public function getDosen()
    {
        return $this->hasOne(Dosen::className(), ['id' => 'dosen_id'])
          ->viaTable('dosen_pengampuh', ['id' => 'dosen_pengampuh_id']);
    }

    public function getParent()
    {
        return $this->hasOne(Materi::className(), ['id' => 'parent_id'])
          ->viaTable('materi_item', ['child_id' => 'id']);
    }

    public function getChilds()
    {
        return $this->hasMany(Materi::className(), ['id' => 'child_id'])
          ->viaTable('materi_item', ['parent_id' => 'id']);
    }

    public function getWaktu()
    {
        return $this->hasOne(WaktuKuis::className(),['kuis_id'=>'id']);
    }
}
