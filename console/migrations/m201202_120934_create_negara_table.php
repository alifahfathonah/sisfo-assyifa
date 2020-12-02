<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%negara}}`.
 */
class m201202_120934_create_negara_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%negara}}', [
            'id' => $this->primaryKey(),
            'id_negara' => $this->string(),
            'nama_negara' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%negara}}');
    }
}
