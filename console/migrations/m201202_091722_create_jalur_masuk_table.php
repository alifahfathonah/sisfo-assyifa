<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%jalur_masuk}}`.
 */
class m201202_091722_create_jalur_masuk_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%jalur_masuk}}', [
            'id' => $this->primaryKey(),
            'id_jalur_masuk' => $this->string(),
            'nama_jalur_masuk' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%jalur_masuk}}');
    }
}
