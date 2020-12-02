<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%semester}}`.
 */
class m201202_091256_create_semester_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%semester}}', [
            'id' => $this->primaryKey(),
            'id_semester' => $this->string(),
            'id_tahun_ajaran' => $this->string(),
            'nama_semester' => $this->string(),
            'semester' => $this->string(),
            'a_periode_aktif' => $this->string(),
            'tanggal_mulai' => $this->string(),
            'tanggal_selesai' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%semester}}');
    }
}
