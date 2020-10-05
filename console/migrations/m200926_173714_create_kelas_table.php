<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kelas}}`.
 */
class m200926_173714_create_kelas_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kelas}}', [
            'id' => $this->primaryKey(),
            'tahun_akademik_id' => $this->integer(),
            'prodi_id' => $this->integer(),
            'kode' => $this->string(),
            'nama' => $this->string(),
            'semester' => $this->integer(),
            'created_at' => $this->timestamp(),
        ]);

        $this->createIndex(
            'idx-kelas-tahun_akademik_id',
            'kelas',
            'tahun_akademik_id'
        );

        $this->addForeignKey(
            'fk-kelas-tahun_akademik_id',
            'kelas',
            'tahun_akademik_id',
            'tahun_akademik',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-kelas-prodi_id',
            'kelas',
            'prodi_id'
        );

        $this->addForeignKey(
            'fk-kelas-prodi_id',
            'kelas',
            'prodi_id',
            'prodi',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%kelas}}');
    }
}
