<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%list_prodi}}`.
 */
class m201202_091445_create_list_prodi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%list_prodi}}', [
            'id' => $this->primaryKey(),
            'id_prodi' => $this->string(),
            'kode_program_studi' => $this->string(),
            'nama_program_studi' => $this->string(),
            'status' => $this->string(),
            'id_jenjang_pendidikan' => $this->string(),
            'nama_jenjang_pendidikan' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%list_prodi}}');
    }
}
