<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%skripsi}}`.
 */
class m201026_062012_create_skripsi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%skripsi}}', [
            'id' => $this->primaryKey(),
            'tahun_akademik_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-skripsi-tahun_akademik_id',
            'skripsi',
            'tahun_akademik_id'
        );

        $this->addForeignKey(
            'fk-skripsi-tahun_akademik_id',
            'skripsi',
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
        $this->dropTable('{{%skripsi}}');
    }
}
