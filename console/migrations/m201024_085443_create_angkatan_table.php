<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%angkatan}}`.
 */
class m201024_085443_create_angkatan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%angkatan}}', [
            'id' => $this->primaryKey(),
            'tahun' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%angkatan}}');
    }
}
