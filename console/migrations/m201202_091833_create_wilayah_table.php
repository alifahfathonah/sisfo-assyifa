<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%wilayah}}`.
 */
class m201202_091833_create_wilayah_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%wilayah}}', [
            'id' => $this->primaryKey(),
            'id_wilayah' => $this->string(),
            'id_negara' => $this->string(),
            'nama_wilayah' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%wilayah}}');
    }
}
