<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "negara".
 *
 * @property int $id
 * @property string|null $id_negara
 * @property string|null $nama_negara
 */
class Negara extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'negara';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_negara', 'nama_negara'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_negara' => 'Id Negara',
            'nama_negara' => 'Nama Negara',
        ];
    }
}
