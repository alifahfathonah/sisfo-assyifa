<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%prodi}}`.
 */
class m200926_173619_create_prodi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%prodi}}', [
            'id' => $this->primaryKey(),
            'kode' => $this->string(),
            'nama' => $this->string(),
            'jenjang' => $this->string(),
            'created_at' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%prodi}}');
    }
}
