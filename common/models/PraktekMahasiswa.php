<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "praktek_mahasiswa".
 *
 * @property int $id
 * @property int|null $praktek_id
 * @property int|null $mahasiswa_id
 *
 * @property Mahasiswa $mahasiswa
 * @property Praktek $praktek
 */
class PraktekMahasiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'praktek_mahasiswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['praktek_id', 'mahasiswa_id'], 'integer'],
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
            'praktek_id' => 'Praktek',
            'mahasiswa_id' => 'Mahasiswa',
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
     * Gets query for [[Praktek]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPraktek()
    {
        return $this->hasOne(Praktek::className(), ['id' => 'praktek_id']);
    }
}
