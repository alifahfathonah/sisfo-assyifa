<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kartu_ujian}}`.
 */
class m201202_151343_create_kartu_ujian_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kartu_ujian}}', [
            'id' => $this->primaryKey(),
            'id_semester' => $this->string(),
            'id_mahasiswa' => $this->string(),
            'status' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%kartu_ujian}}');
    }
}
