<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "wilayah".
 *
 * @property int $id
 * @property string|null $id_wilayah
 * @property string|null $id_negara
 * @property string|null $nama_wilayah
 */
class Wilayah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wilayah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_wilayah', 'id_negara', 'nama_wilayah'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_wilayah' => 'Id Wilayah',
            'id_negara' => 'Id Negara',
            'nama_wilayah' => 'Nama Wilayah',
        ];
    }
}
