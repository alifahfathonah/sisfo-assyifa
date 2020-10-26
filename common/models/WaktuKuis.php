<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "waktu_kuis".
 *
 * @property int $id
 * @property int|null $kuis_id
 * @property string|null $waktu_mulai
 * @property string|null $waktu_selesai
 *
 * @property Materi $kuis
 */
class WaktuKuis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'waktu_kuis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kuis_id'], 'integer'],
            [['waktu_mulai', 'waktu_selesai'], 'safe'],
            [['kuis_id'], 'exist', 'skipOnError' => true, 'targetClass' => Materi::className(), 'targetAttribute' => ['kuis_id' => 'id']],
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
            'waktu_mulai' => 'Waktu Mulai',
            'waktu_selesai' => 'Waktu Selesai',
        ];
    }

    /**
     * Gets query for [[Kuis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKuis()
    {
        return $this->hasOne(Materi::className(), ['id' => 'kuis_id']);
    }
}
