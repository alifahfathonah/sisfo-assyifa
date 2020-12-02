<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jalur_masuk".
 *
 * @property int $id
 * @property string|null $id_jalur_masuk
 * @property string|null $nama_jalur_masuk
 */
class JalurMasuk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jalur_masuk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jalur_masuk', 'nama_jalur_masuk'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_jalur_masuk' => 'Id Jalur Masuk',
            'nama_jalur_masuk' => 'Nama Jalur Masuk',
        ];
    }
}
