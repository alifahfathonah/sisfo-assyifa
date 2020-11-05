<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%praktek_mahasiswa}}`.
 */
class m201104_123300_create_praktek_mahasiswa_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%praktek_mahasiswa}}', [
            'id' => $this->primaryKey(),
            'praktek_id' => $this->integer(),
            'mahasiswa_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-praktek_mahasiswa-praktek_id',
            'praktek_mahasiswa',
            'praktek_id'
        );

        $this->addForeignKey(
            'fk-praktek_mahasiswa-praktek_id',
            'praktek_mahasiswa',
            'praktek_id',
            'praktek',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-praktek_mahasiswa-mahasiswa_id',
            'praktek_mahasiswa',
            'mahasiswa_id'
        );

        $this->addForeignKey(
            'fk-praktek_mahasiswa-mahasiswa_id',
            'praktek_mahasiswa',
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
        $this->dropTable('{{%praktek_mahasiswa}}');
    }
}
