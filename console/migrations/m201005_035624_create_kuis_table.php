<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kuis}}`.
 */
class m201005_035624_create_kuis_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kuis}}', [
            'id' => $this->primaryKey(),
            'materi_id' => $this->integer(),
            'mahasiswa_id' => $this->integer(),
            'status' => $this->string(),
        ]);

        $this->createIndex(
            'idx-kuis-materi_id',
            'kuis',
            'materi_id'
        );

        $this->addForeignKey(
            'fk-kuis-materi_id',
            'kuis',
            'materi_id',
            'materi',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-kuis-mahasiswa_id',
            'kuis',
            'mahasiswa_id'
        );

        $this->addForeignKey(
            'fk-kuis-mahasiswa_id',
            'kuis',
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
        $this->dropTable('{{%kuis}}');
    }
}
