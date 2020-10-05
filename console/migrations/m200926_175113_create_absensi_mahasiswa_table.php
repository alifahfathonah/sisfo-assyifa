<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%absensi_mahasiswa}}`.
 */
class m200926_175113_create_absensi_mahasiswa_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%absensi_mahasiswa}}', [
            'id' => $this->primaryKey(),
            'absensi_id' => $this->integer(),
            'mahasiswa_id' => $this->integer(),
            'status' => $this->string(),
            'keterangan' => $this->string(),
        ]);

        $this->createIndex(
            'idx-absensi_mahasiswa-absensi_id',
            'absensi_mahasiswa',
            'absensi_id'
        );

        $this->addForeignKey(
            'fk-absensi_mahasiswa-absensi_id',
            'absensi_mahasiswa',
            'absensi_id',
            'absensi',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-absensi_mahasiswa-mahasiswa_id',
            'absensi_mahasiswa',
            'mahasiswa_id'
        );

        $this->addForeignKey(
            'fk-absensi_mahasiswa-mahasiswa_id',
            'absensi_mahasiswa',
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
        $this->dropTable('{{%absensi_mahasiswa}}');
    }
}
