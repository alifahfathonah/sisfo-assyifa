<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kuis_jawaban}}`.
 */
class m201005_035725_create_kuis_jawaban_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kuis_jawaban}}', [
            'id' => $this->primaryKey(),
            'kuis_id' => $this->integer(),
            'materi_id' => $this->integer(),
            'jawaban_id' => $this->integer(),
            'jawaban_konten' => $this->text(),
            'status' => $this->string(),
        ]);

        $this->createIndex(
            'idx-kuis_jawaban-kuis_id',
            'kuis_jawaban',
            'kuis_id'
        );

        $this->addForeignKey(
            'fk-kuis_jawaban-kuis_id',
            'kuis_jawaban',
            'kuis_id',
            'kuis',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-kuis_jawaban-materi_id',
            'kuis_jawaban',
            'materi_id'
        );

        $this->addForeignKey(
            'fk-kuis_jawaban-materi_id',
            'kuis_jawaban',
            'materi_id',
            'materi',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-kuis_jawaban-jawaban_id',
            'kuis_jawaban',
            'jawaban_id'
        );

        $this->addForeignKey(
            'fk-kuis_jawaban-jawaban_id',
            'kuis_jawaban',
            'jawaban_id',
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
        $this->dropTable('{{%kuis_jawaban}}');
    }
}
