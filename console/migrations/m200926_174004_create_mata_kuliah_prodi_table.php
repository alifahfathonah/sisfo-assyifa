<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mata_kuliah_prodi}}`.
 */
class m200926_174004_create_mata_kuliah_prodi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mata_kuliah_prodi}}', [
            'id' => $this->primaryKey(),
            'mata_kuliah_id' => $this->integer(),
            'prodi_id' => $this->integer(),
            'semester' => $this->integer(),
            'status' => $this->string(),
            'bobot_sks' => $this->integer(),
            'tahun_akademik_id' => $this->integer(),
            'created_at' => $this->timestamp(),
        ]);

        $this->createIndex(
            'idx-mata_kuliah_prodi-mata_kuliah_id',
            'mata_kuliah_prodi',
            'mata_kuliah_id'
        );

        $this->addForeignKey(
            'fk-mata_kuliah_prodi-mata_kuliah_id',
            'mata_kuliah_prodi',
            'mata_kuliah_id',
            'mata_kuliah',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-mata_kuliah_prodi-prodi_id',
            'mata_kuliah_prodi',
            'prodi_id'
        );

        $this->addForeignKey(
            'fk-mata_kuliah_prodi-prodi_id',
            'mata_kuliah_prodi',
            'prodi_id',
            'prodi',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-mata_kuliah_prodi-tahun_akademik_id',
            'mata_kuliah_prodi',
            'tahun_akademik_id'
        );

        $this->addForeignKey(
            'fk-mata_kuliah_prodi-tahun_akademik_id',
            'mata_kuliah_prodi',
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
        $this->dropTable('{{%mata_kuliah_prodi}}');
    }
}
