<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dosen_pengampuh}}`.
 */
class m200926_174729_create_jadwal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%jadwal}}', [
            'id' => $this->primaryKey(),
            'dosen_pengampuh_id' => $this->integer(),
            'hari' => $this->string(),
            'waktu_mulai' => $this->time(),
            'waktu_selesai' => $this->time(),
            'created_at' => $this->timestamp(),
        ]);

        $this->createIndex(
            'idx-jadwal-dosen_pengampuh_id',
            'jadwal',
            'dosen_pengampuh_id'
        );

        $this->addForeignKey(
            'fk-jadwal-dosen_pengampuh_id',
            'jadwal',
            'dosen_pengampuh_id',
            'dosen_pengampuh',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%jadwal}}');
    }
}
