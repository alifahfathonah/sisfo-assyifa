<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%absensi}}`.
 */
class m200926_175025_create_absensi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%absensi}}', [
            'id' => $this->primaryKey(),
            'jadwal_id' => $this->integer(),
            'pertemuan' => $this->integer(),
            'tanggal' => $this->date(),
            'created_at' => $this->timestamp(),
        ]);

        $this->createIndex(
            'idx-absensi-jadwal_id',
            'absensi',
            'jadwal_id'
        );

        $this->addForeignKey(
            'fk-absensi-jadwal_id',
            'absensi',
            'jadwal_id',
            'jadwal',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%absensi}}');
    }
}
