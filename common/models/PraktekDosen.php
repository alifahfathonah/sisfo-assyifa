<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "praktek_dosen".
 *
 * @property int $id
 * @property int|null $praktek_id
 * @property int|null $dosen_id
 *
 * @property Dosen $dosen
 * @property Praktek $praktek
 */
class PraktekDosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'praktek_dosen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['praktek_id', 'dosen_id'], 'integer'],
            [['dosen_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['dosen_id' => 'id']],
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
            'dosen_id' => 'Dosen ID',
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
     * Gets query for [[Praktek]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPraktek()
    {
        return $this->hasOne(Praktek::className(), ['id' => 'praktek_id']);
    }
}
