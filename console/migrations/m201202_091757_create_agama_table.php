<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%agama}}`.
 */
class m201202_091757_create_agama_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%agama}}', [
            'id' => $this->primaryKey(),
            'id_agama' => $this->string(),
            'nama_agama' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%agama}}');
    }
}
