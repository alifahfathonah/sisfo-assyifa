<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "angkatan".
 *
 * @property int $id
 * @property string|null $tahun
 *
 * @property MahasiswaAngkatan[] $mahasiswaAngkatans
 */
class Angkatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'angkatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tahun' => 'Tahun',
        ];
    }

    /**
     * Gets query for [[MahasiswaAngkatans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMahasiswaAngkatans()
    {
        return $this->hasMany(MahasiswaAngkatan::className(), ['angkatan_id' => 'id']);
    }
}
