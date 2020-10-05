<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dosen".
 *
 * @property int $id
 * @property string|null $NIDN
 * @property string|null $nama
 * @property string|null $jenis_kelamin
 * @property string|null $status
 * @property int|null $user_id
 * @property string $created_at
 *
 * @property User $user
 * @property DosenPengampuh[] $dosenPengampuhs
 */
class Dosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dosen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NIDN','user_id'], 'integer'],
            [['NIDN'], 'unique'],
            [['created_at'], 'safe'],
            [['nama', 'jenis_kelamin', 'status'], 'string', 'max' => 255],
            [['NIDN','nama', 'jenis_kelamin', 'status'],'required'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'NIDN' => 'NIDN',
            'nama' => 'Nama',
            'jenis_kelamin' => 'Jenis Kelamin',
            'status' => 'Status',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[DosenPengampuhs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDosenPengampuhs()
    {
        return $this->hasMany(DosenPengampuh::className(), ['dosen_id' => 'id']);
    }
}
