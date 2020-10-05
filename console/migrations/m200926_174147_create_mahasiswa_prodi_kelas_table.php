<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mahasiswa_prodi_kelas}}`.
 */
class m200926_174147_create_mahasiswa_prodi_kelas_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mahasiswa_kelas}}', [
            'id' => $this->primaryKey(),
            'kelas_id' => $this->integer(),
            'mahasiswa_id' => $this->integer(),
            'tahun_akademik_id' => $this->integer(),
            'created_at' => $this->timestamp(),
        ]);

        $this->createIndex(
            'idx-mahasiswa_kelas-kelas_id',
            'mahasiswa_kelas',
            'kelas_id'
        );

        $this->addForeignKey(
            'fk-mahasiswa_kelas-kelas_id',
            'mahasiswa_kelas',
            'kelas_id',
            'kelas',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-mahasiswa_kelas-mahasiswa_id',
            'mahasiswa_kelas',
            'mahasiswa_id'
        );

        $this->addForeignKey(
            'fk-mahasiswa_kelas-mahasiswa_id',
            'mahasiswa_kelas',
            'mahasiswa_id',
            'mahasiswa',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-mahasiswa_kelas-tahun_akademik_id',
            'mahasiswa_kelas',
            'tahun_akademik_id'
        );

        $this->addForeignKey(
            'fk-mahasiswa_kelas-tahun_akademik_id',
            'mahasiswa_kelas',
            'tahun_akademik_id',
            'tahun_akademik',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mahasiswa_prodi_kelas}}');
    }
}
