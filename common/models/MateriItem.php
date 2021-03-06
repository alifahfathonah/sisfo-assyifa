<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "materi_items".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int|null $child_id
 *
 * @property Materi $child
 * @property Materi $parent
 */
class MateriItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'materi_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'child_id'], 'integer'],
            [['child_id'], 'exist', 'skipOnError' => true, 'targetClass' => Materi::className(), 'targetAttribute' => ['child_id' => 'id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Materi::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'child_id' => 'Child ID',
        ];
    }

    /**
     * Gets query for [[Child]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChild()
    {
        return $this->hasOne(Materi::className(), ['id' => 'child_id']);
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Materi::className(), ['id' => 'parent_id']);
    }
}
