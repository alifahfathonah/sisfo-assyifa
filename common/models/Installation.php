<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "installation".
 *
 * @property int $id
 * @property string|null $nama
 * @property string|null $logo
 * @property string $created_at
 */
class Installation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'installation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['nama'], 'string', 'max' => 255],
            [['logo'],'file','skipOnEmpty'=>TRUE,'extensions'=>'jpg, png']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'logo' => 'Logo',
            'created_at' => 'Created At',
        ];
    }
}
