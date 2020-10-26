<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dosen_pembimbing}}`.
 */
class m201026_062129_create_dosen_pembimbing_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dosen_pembimbing}}', [
            'id' => $this->primaryKey(),
            'dosen_id' => $this->integer(),
            'mahasiswa_id' => $this->integer(),
            'status' => $this->string(),
        ]);

        $this->createIndex(
            'idx-dosen_pembimbing-mahasiswa_id',
            'dosen_pembimbing',
            'mahasiswa_id'
        );

        $this->addForeignKey(
            'fk-dosen_pembimbing-mahasiswa_id',
            'dosen_pembimbing',
            'mahasiswa_id',
            'mahasiswa',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-dosen_pembimbing-dosen_id',
            'dosen_pembimbing',
            'dosen_id'
        );

        $this->addForeignKey(
            'fk-dosen_pembimbing-dosen_id',
            'dosen_pembimbing',
            'dosen_id',
            'dosen',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%dosen_pembimbing}}');
    }
}
