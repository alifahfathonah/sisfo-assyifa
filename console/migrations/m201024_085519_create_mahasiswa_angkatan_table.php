<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mahasiswa_angkatan}}`.
 */
class m201024_085519_create_mahasiswa_angkatan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mahasiswa_angkatan}}', [
            'id' => $this->primaryKey(),
            'mahasiswa_id' => $this->integer(),
            'angkatan_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-mahasiswa_angkatan-angkatan_id',
            'mahasiswa_angkatan',
            'angkatan_id'
        );

        $this->addForeignKey(
            'fk-mahasiswa_angkatan-angkatan_id',
            'mahasiswa_angkatan',
            'angkatan_id',
            'angkatan',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-mahasiswa_angkatan-mahasiswa_id',
            'mahasiswa_angkatan',
            'mahasiswa_id'
        );

        $this->addForeignKey(
            'fk-mahasiswa_angkatan-mahasiswa_id',
            'mahasiswa_angkatan',
            'mahasiswa_id',
            'mahasiswa',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mahasiswa_angkatan}}');
    }
}
