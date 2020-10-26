<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%penyimpanan}}`.
 */
class m201026_041900_create_penyimpanan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%penyimpanan}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'nama' => $this->string(),
            'berkas' => $this->string(),
        ]);

        $this->createIndex(
            'idx-penyimpanan-user_id',
            'penyimpanan',
            'user_id'
        );

        $this->addForeignKey(
            'fk-penyimpanan-user_id',
            'penyimpanan',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%penyimpanan}}');
    }
}
