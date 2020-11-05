<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "praktek_file".
 *
 * @property int $id
 * @property int|null $praktek_id
 * @property int|null $mahasiswa_id
 * @property int|null $dosen_id
 * @property string|null $file_url
 * @property string|null $file_koreksi_url
 * @property string|null $keterangan
 *
 * @property Dosen $dosen
 * @property Mahasiswa $mahasiswa
 * @property Praktek $praktek
 */
class PraktekFile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'praktek_file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['praktek_id', 'mahasiswa_id', 'dosen_id'], 'integer'],
            [['keterangan'], 'string'],
            [['file_url', 'file_koreksi_url'], 'string', 'max' => 255],
            [['dosen_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['dosen_id' => 'id']],
            [['mahasiswa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mahasiswa::className(), 'targetAttribute' => ['mahasiswa_id' => 'id']],
            [['praktek_id'], 'exist', 'skipOnError' => true, 'targetClass' => Praktek::className(), 'targetAttribute' => ['praktek_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'praktek_id' => 'Praktek ID',
            'mahasiswa_id' => 'Mahasiswa ID',
            'dosen_id' => 'Dosen ID',
            'file_url' => 'File Url',
            'file_koreksi_url' => 'File Koreksi Url',
            'keterangan' => 'Keterangan',
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
     * Gets query for [[Mahasiswa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMahasiswa()
    {
        return $this->hasOne(Mahasiswa::className(), ['id' => 'mahasiswa_id']);
    }

    /**
     * Gets query for [[Praktek]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPraktek()
    {
        return $this->hasOne(Praktek::className(), ['id' => 'praktek_id']);
    }
}
