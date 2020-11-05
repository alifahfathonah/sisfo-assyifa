<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%praktek_dosen}}`.
 */
class m201104_123323_create_praktek_dosen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%praktek_dosen}}', [
            'id' => $this->primaryKey(),
            'praktek_id' => $this->integer(),
            'dosen_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-praktek_dosen-praktek_id',
            'praktek_dosen',
            'praktek_id'
        );

        $this->addForeignKey(
            'fk-praktek_dosen-praktek_id',
            'praktek_dosen',
            'praktek_id',
            'praktek',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-praktek_dosen-dosen_id',
            'praktek_dosen',
            'dosen_id'
        );

        $this->addForeignKey(
            'fk-praktek_dosen-dosen_id',
            'praktek_dosen',
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
        $this->dropTable('{{%praktek_dosen}}');
    }
}
