<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dosen}}`.
 */
class m200926_174217_create_dosen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dosen}}', [
            'id' => $this->primaryKey(),
            'NIDN' => $this->string(),
            'nama' => $this->string(),
            'jenis_kelamin' => $this->string(),
            'status' => $this->string(),
            'user_id' => $this->integer(),
            'created_at' => $this->timestamp(),
        ]);

        $this->createIndex(
            'idx-dosen-user_id',
            'dosen',
            'user_id'
        );

        $this->addForeignKey(
            'fk-dosen-user_id',
            'dosen',
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
        $this->dropTable('{{%dosen}}');
    }
}
