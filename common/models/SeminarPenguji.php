<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "seminar_penguji".
 *
 * @property int $id
 * @property int|null $seminar_id
 * @property int|null $dosen_id
 * @property string|null $status
 *
 * @property Dosen $dosen
 * @property Seminar $seminar
 */
class SeminarPenguji extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seminar_penguji';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seminar_id', 'dosen_id'], 'integer'],
            [['status'], 'string', 'max' => 255],
            [['dosen_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['dosen_id' => 'id']],
            [['seminar_id'], 'exist', 'skipOnError' => true, 'targetClass' => Seminar::className(), 'targetAttribute' => ['seminar_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'seminar_id' => 'Seminar ID',
            'dosen_id' => 'Dosen ID',
            'status' => 'Status',
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
     * Gets query for [[Seminar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeminar()
    {
        return $this->hasOne(Seminar::className(), ['id' => 'seminar_id']);
    }
}
