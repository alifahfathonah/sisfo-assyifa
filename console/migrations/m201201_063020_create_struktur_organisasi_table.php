<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%struktur_organisasi}}`.
 */
class m201201_063020_create_struktur_organisasi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%struktur_organisasi}}', [
            'id' => $this->primaryKey(),
            'dosen_id' => $this->integer(),
            'jabatan' => $this->string(),
        ]);
        
        $this->createIndex(
            'idx-struktur_organisasi-dosen_id',
            'struktur_organisasi',
            'dosen_id'
        );

        $this->addForeignKey(
            'fk-struktur_organisasi-dosen_id',
            'struktur_organisasi',
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
        $this->dropTable('{{%struktur_organisasi}}');
    }
}
