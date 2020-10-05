<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%application}}`.
 */
class m200926_185208_create_application_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%application}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(),
            'icon' => $this->string(),
            'url' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%application}}');
    }
}
