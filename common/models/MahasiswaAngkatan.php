<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mahasiswa_angkatan".
 *
 * @property int $id
 * @property int|null $mahasiswa_id
 * @property int|null $angkatan_id
 *
 * @property Angkatan $angkatan
 * @property Mahasiswa $mahasiswa
 */
class MahasiswaAngkatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mahasiswa_angkatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mahasiswa_id', 'angkatan_id'], 'integer'],
            [['angkatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Angkatan::className(), 'targetAttribute' => ['angkatan_id' => 'id']],
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
            'mahasiswa_id' => 'Mahasiswa',
            'angkatan_id' => 'Angkatan',
        ];
    }

    /**
     * Gets query for [[Angkatan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAngkatan()
    {
        return $this->hasOne(Angkatan::className(), ['id' => 'angkatan_id']);
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
