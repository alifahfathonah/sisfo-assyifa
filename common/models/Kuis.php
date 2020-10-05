<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kuis".
 *
 * @property int $id
 * @property int|null $materi_id
 * @property int|null $mahasiswa_id
 * @property string|null $status
 *
 * @property Mahasiswa $mahasiswa
 * @property Materi $materi
 * @property KuisJawaban[] $kuisJawabans
 */
class Kuis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kuis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['materi_id', 'mahasiswa_id'], 'integer'],
            [['status'], 'string', 'max' => 255],
            [['mahasiswa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mahasiswa::className(), 'targetAttribute' => ['mahasiswa_id' => 'id']],
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
            'materi_id' => 'Materi ID',
            'mahasiswa_id' => 'Mahasiswa ID',
            'status' => 'Status',
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
     * Gets query for [[Materi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMateri()
    {
        return $this->hasOne(Materi::className(), ['id' => 'materi_id']);
    }

    /**
     * Gets query for [[KuisJawabans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKuisJawabans()
    {
        return $this->hasMany(KuisJawaban::className(), ['kuis_id' => 'id']);
    }
}
