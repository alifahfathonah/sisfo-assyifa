<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%materi}}`.
 */
class m200926_175338_create_materi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%materi}}', [
            'id' => $this->primaryKey(),
            'dosen_pengampuh_id' => $this->integer(),
            'judul' => $this->string(),
            'konten' => $this->text(),
            'status' => $this->string(),
            'no_urut' => $this->integer(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->datetime(),
        ]);

        $this->createIndex(
            'idx-materi-dosen_pengampuh_id',
            'materi',
            'dosen_pengampuh_id'
        );

        $this->addForeignKey(
            'fk-materi-dosen_pengampuh_id',
            'materi',
            'dosen_pengampuh_id',
            'dosen_pengampuh',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%materi}}');
    }
}
