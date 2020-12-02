<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "agama".
 *
 * @property int $id
 * @property string|null $id_agama
 * @property string|null $nama_agama
 */
class Agama extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'agama';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_agama', 'nama_agama'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_agama' => 'Id Agama',
            'nama_agama' => 'Nama Agama',
        ];
    }
}
