<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mahasiswa}}`.
 */
class m200926_174108_create_mahasiswa_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mahasiswa}}', [
            'id' => $this->primaryKey(),
            'NIM' => $this->string(),
            'nama' => $this->string(),
            'jenis_kelamin' => $this->string(),
            'status' => $this->string(),
            'user_id' => $this->integer(),
            'created_at' => $this->timestamp(),
        ]);


        $this->createIndex(
            'idx-mahasiswa-user_id',
            'mahasiswa',
            'user_id'
        );

        $this->addForeignKey(
            'fk-mahasiswa-user_id',
            'mahasiswa',
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
        $this->dropTable('{{%mahasiswa}}');
    }
}
