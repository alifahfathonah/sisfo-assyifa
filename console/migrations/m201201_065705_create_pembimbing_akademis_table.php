<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pembimbing_akademis}}`.
 */
class m201201_065705_create_pembimbing_akademis_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pembimbing_akademis}}', [
            'id' => $this->primaryKey(),
            'dosen_id'=>$this->integer(),
            'mahasiswa_id'=>$this->integer()
        ]);

        $this->createIndex(
            'idx-pembimbing_akademis-dosen_id',
            'pembimbing_akademis',
            'dosen_id'
        );

        $this->addForeignKey(
            'fk-pembimbing_akademis-dosen_id',
            'pembimbing_akademis',
            'dosen_id',
            'dosen',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-pembimbing_akademis-mahasiswa_id',
            'pembimbing_akademis',
            'mahasiswa_id'
        );

        $this->addForeignKey(
            'fk-pembimbing_akademis-mahasiswa_id',
            'pembimbing_akademis',
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
        $this->dropTable('{{%pembimbing_akademis}}');
    }
}
