<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%praktek}}`.
 */
class m201104_123223_create_praktek_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%praktek}}', [
            'id' => $this->primaryKey(),
            'tahun_akademik_id' => $this->integer(),
            'instansi' => $this->string(),
            'bulan' => $this->string(),
            'tahun' => $this->integer(),
            'tanggal' => $this->timestamp(),
        ]);

        $this->createIndex(
            'idx-praktek-tahun_akademik_id',
            'praktek',
            'tahun_akademik_id'
        );

        $this->addForeignKey(
            'fk-praktek-tahun_akademik_id',
            'praktek',
            'tahun_akademik_id',
            'tahun_akademik',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%praktek}}');
    }
}
