<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%installation}}`.
 */
class m200926_185341_create_installation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%installation}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(),
            'logo' => $this->string(),
            'created_at' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%installation}}');
    }
}
