<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%list_dosen}}`.
 */
class m201122_144724_create_list_dosen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%list_dosen}}', [
            'id' => $this->primaryKey(),
            'id_dosen' => $this->string(),
            'nama_dosen' => $this->string(),
            'nidn' => $this->string(),
            'nip' => $this->string(),
            'jenis_kelamin' => $this->string(),
            'id_agama' => $this->string(),
            'nama_agama' => $this->string(),
            'tanggal_lahir' => $this->string(),
            'id_status_aktif' => $this->string(),
            'nama_status_aktif' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%list_dosen}}');
    }
}
