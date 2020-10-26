<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "seminar".
 *
 * @property int $id
 * @property int|null $mahasiswa_id
 * @property string|null $judul
 * @property string|null $nilai_harapan
 * @property string|null $nilai_didapat
 *
 * @property Mahasiswa $mahasiswa
 * @property SeminarPenguji[] $seminarPengujis
 */
class Seminar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seminar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mahasiswa_id'], 'integer'],
            [['judul', 'nilai_harapan', 'nilai_didapat','file_url'], 'string', 'max' => 255],
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
            'nilai_harapan' => 'Nilai Harapan',
            'nilai_didapat' => 'Nilai Didapat',
            'tanggal' => 'Tanggal',
            'file_url' => 'File URL',
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

    /**
     * Gets query for [[SeminarPengujis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeminarPengujis()
    {
        return $this->hasMany(SeminarPenguji::className(), ['seminar_id' => 'id']);
    }
}
