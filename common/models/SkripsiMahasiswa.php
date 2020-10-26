<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "skripsi_mahasiswa".
 *
 * @property int $id
 * @property int|null $skripsi_id
 * @property int|null $mahasiswa_id
 *
 * @property Mahasiswa $mahasiswa
 * @property Skripsi $skripsi
 */
class SkripsiMahasiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'skripsi_mahasiswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['skripsi_id', 'mahasiswa_id'], 'integer'],
            [['mahasiswa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mahasiswa::className(), 'targetAttribute' => ['mahasiswa_id' => 'id']],
            [['skripsi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Skripsi::className(), 'targetAttribute' => ['skripsi_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'skripsi_id' => 'Skripsi ID',
            'mahasiswa_id' => 'Mahasiswa ID',
        ];
    }

    /**
     * Gets query for [[Mahasiswa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMahasiswa()
    {
        return $this->hasOne(Mahasiswa::className(), ['id' => 'mahasiswa_id'])->joinWith(['pembimbings']);
    }

    /**
     * Gets query for [[Skripsi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSkripsi()
    {
        return $this->hasOne(Skripsi::className(), ['id' => 'skripsi_id']);
    }
}
