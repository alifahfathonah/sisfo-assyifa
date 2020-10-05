<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tahun_akademik}}`.
 */
class m200926_173530_create_tahun_akademik_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tahun_akademik}}', [
            'id' => $this->primaryKey(),
            'tahun' => $this->integer(),
            'periode' => $this->integer(),
            'status' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tahun_akademik}}');
    }
}
