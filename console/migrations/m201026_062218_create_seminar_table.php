<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%seminar}}`.
 */
class m201026_062218_create_seminar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%seminar}}', [
            'id' => $this->primaryKey(),
            'mahasiswa_id' => $this->integer(),
            'judul' => $this->string(),
            'nilai_harapan' => $this->string(),
            'nilai_didapat' => $this->string(),
            'tanggal' => $this->date(),
            'file_url' => $this->string(),
        ]);

        $this->createIndex(
            'idx-seminar-mahasiswa_id',
            'seminar',
            'mahasiswa_id'
        );

        $this->addForeignKey(
            'fk-seminar-mahasiswa_id',
            'seminar',
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
        $this->dropTable('{{%seminar}}');
    }
}
