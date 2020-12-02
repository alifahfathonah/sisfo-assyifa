<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "struktur_organisasi".
 *
 * @property int $id
 * @property int|null $dosen_id
 * @property string|null $jabatan
 *
 * @property Dosen $dosen
 */
class StrukturOrganisasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'struktur_organisasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dosen_id'], 'integer'],
            [['jabatan'], 'string', 'max' => 255],
            [['dosen_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['dosen_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dosen_id' => 'Dosen ID',
            'jabatan' => 'Jabatan',
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
}
