<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%waktu_kuis}}`.
 */
class m201025_162617_create_waktu_kuis_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%waktu_kuis}}', [
            'id' => $this->primaryKey(),
            'kuis_id' => $this->integer(),
            'waktu_mulai' => $this->datetime(),
            'waktu_selesai' => $this->datetime(),
        ]);

        $this->createIndex(
            'idx-kuis-kuis_id',
            'waktu_kuis',
            'kuis_id'
        );

        $this->addForeignKey(
            'fk-kuis-kuis_id',
            'waktu_kuis',
            'kuis_id',
            'materi',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%waktu_kuis}}');
    }
}
