<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%seminar_penguji}}`.
 */
class m201026_062306_create_seminar_penguji_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%seminar_penguji}}', [
            'id' => $this->primaryKey(),
            'seminar_id' => $this->integer(),
            'dosen_id' => $this->integer(),
            'status' => $this->string(),
        ]);

        $this->createIndex(
            'idx-seminar_penguji-dosen_id',
            'seminar_penguji',
            'dosen_id'
        );

        $this->addForeignKey(
            'fk-seminar_penguji-dosen_id',
            'seminar_penguji',
            'dosen_id',
            'dosen',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-seminar_penguji-seminar_id',
            'seminar_penguji',
            'seminar_id'
        );

        $this->addForeignKey(
            'fk-seminar_penguji-seminar_id',
            'seminar_penguji',
            'seminar_id',
            'seminar',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%seminar_penguji}}');
    }
}
