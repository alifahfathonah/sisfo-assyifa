<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%jenis_pendaftaran}}`.
 */
class m201202_091638_create_jenis_pendaftaran_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%jenis_pendaftaran}}', [
            'id' => $this->primaryKey(),
            'id_jenis_daftar' => $this->string(),
            'nama_jenis_daftar' => $this->string(),
            'untuk_daftar_sekolah' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%jenis_pendaftaran}}');
    }
}
