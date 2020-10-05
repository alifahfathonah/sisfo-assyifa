<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dosen_pengampuh}}`.
 */
class m200926_174326_create_dosen_pengampuh_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dosen_pengampuh}}', [
            'id' => $this->primaryKey(),
            'dosen_id' => $this->integer(),
            'mata_kuliah_prodi_id' => $this->integer(),
            'kelas_id' => $this->integer(),
            'created_at' => $this->timestamp(),
        ]);

        $this->createIndex(
            'idx-dosen_pengampuh-dosen_id',
            'dosen_pengampuh',
            'dosen_id'
        );

        $this->addForeignKey(
            'fk-dosen_pengampuh-dosen_id',
            'dosen_pengampuh',
            'dosen_id',
            'dosen',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-dosen_pengampuh-mata_kuliah_prodi_id',
            'dosen_pengampuh',
            'mata_kuliah_prodi_id'
        );

        $this->addForeignKey(
            'fk-dosen_pengampuh-mata_kuliah_prodi_id',
            'dosen_pengampuh',
            'mata_kuliah_prodi_id',
            'mata_kuliah_prodi',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-dosen_pengampuh-kelas_id',
            'dosen_pengampuh',
            'kelas_id'
        );

        $this->addForeignKey(
            'fk-dosen_pengampuh-kelas_id',
            'dosen_pengampuh',
            'kelas_id',
            'kelas',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%dosen_pengampuh}}');
    }
}
