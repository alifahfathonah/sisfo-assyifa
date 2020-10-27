<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pengajuan_skripsi".
 *
 * @property int $id
 * @property int|null $mahasiswa_id
 * @property string|null $judul
 * @property string|null $konten
 * @property string|null $status
 * @property string|null $file_url
 *
 * @property Mahasiswa $mahasiswa
 */
class PengajuanSkripsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengajuan_skripsi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mahasiswa_id'], 'integer'],
            [['konten'], 'string'],
            [['judul', 'status', 'file_url'], 'string', 'max' => 255],
            [['mahasiswa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mahasiswa::className(), 'targetAttribute' => ['mahasiswa_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mahasiswa_id' => 'Mahasiswa ID',
            'judul' => 'Judul',
            'konten' => 'Konten',
            'status' => 'Status',
            'file_url' => 'File Url',
        ];
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
}
