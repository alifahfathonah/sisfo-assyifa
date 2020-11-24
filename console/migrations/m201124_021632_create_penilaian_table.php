<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%penilaian}}`.
 */
class m201124_021632_create_penilaian_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%penilaian}}', [
            'id' => $this->primaryKey(),
            'jadwal_id' => $this->integer(),
            'mahasiswa_id' => $this->integer(),
            'nilai_angka' => $this->string(),
            'nilai_huruf' => $this->string(),
        ]);

        $this->createIndex(
            'idx-penilaian-jadwal_id',
            'penilaian',
            'jadwal_id'
        );

        $this->addForeignKey(
            'fk-penilaian-jadwal_id',
            'penilaian',
            'jadwal_id',
            'jadwal',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-penilaian-mahasiswa_id',
            'penilaian',
            'mahasiswa_id'
        );

        $this->addForeignKey(
            'fk-penilaian-mahasiswa_id',
            'penilaian',
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
        $this->dropTable('{{%penilaian}}');
    }
}
