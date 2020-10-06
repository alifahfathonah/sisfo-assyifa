<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kuis_jawaban".
 *
 * @property int $id
 * @property int|null $kuis_id
 * @property int|null $materi_id
 * @property int|null $jawaban_id
 * @property string|null $jawaban_konten
 * @property string|null $status
 *
 * @property Materi $jawaban
 * @property Kuis $kuis
 * @property Materi $materi
 */
class KuisJawaban extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kuis_jawaban';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kuis_id', 'materi_id', 'jawaban_id'], 'integer'],
            [['jawaban_konten','skor'], 'string'],
            [['status'], 'string', 'max' => 255],
            [['jawaban_id'], 'exist', 'skipOnError' => true, 'targetClass' => Materi::className(), 'targetAttribute' => ['jawaban_id' => 'id']],
            [['kuis_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kuis::className(), 'targetAttribute' => ['kuis_id' => 'id']],
            [['materi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Materi::className(), 'targetAttribute' => ['materi_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kuis_id' => 'Kuis ID',
            'materi_id' => 'Materi ID',
            'jawaban_id' => 'Jawaban ID',
            'jawaban_konten' => 'Jawaban Konten',
            'status' => 'Status',
            'skor' => 'Skor',
        ];
    }

    /**
     * Gets query for [[Jawaban]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJawaban()
    {
        return $this->hasOne(Materi::className(), ['id' => 'jawaban_id']);
    }

    /**
     * Gets query for [[Kuis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKuis()
    {
        return $this->hasOne(Kuis::className(), ['id' => 'kuis_id']);
    }

    /**
     * Gets query for [[Materi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMateri()
    {
        return $this->hasOne(Materi::className(), ['id' => 'materi_id']);
    }
}
