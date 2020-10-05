<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mata_kuliah}}`.
 */
class m200926_173857_create_mata_kuliah_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mata_kuliah}}', [
            'id' => $this->primaryKey(),
            'kode' => $this->string(),
            'nama' => $this->string(),
            'created_at' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mata_kuliah}}');
    }
}
