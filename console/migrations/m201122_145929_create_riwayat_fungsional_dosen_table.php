<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%riwayat_fungsional_dosen}}`.
 */
class m201122_145929_create_riwayat_fungsional_dosen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%riwayat_fungsional_dosen}}', [
            'id' => $this->primaryKey(),
            'id_dosen' => $this->string(),
            'nidn' => $this->string(),
            'nama_dosen' => $this->string(),
            'id_jabatan_fungsional' => $this->string(),
            'nama_jabatan_fungsional' => $this->string(),
            'sk_jabatan_fungsional' => $this->string(),
            'mulai_sk_jabatan' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%riwayat_fungsional_dosen}}');
    }
}
