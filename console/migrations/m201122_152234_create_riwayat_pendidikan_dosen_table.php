<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%riwayat_pendidikan_dosen}}`.
 */
class m201122_152234_create_riwayat_pendidikan_dosen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%riwayat_pendidikan_dosen}}', [
            'id' => $this->primaryKey(),
            'id_dosen' => $this->string(),
            'nidn' => $this->string(),
            'nama_dosen' => $this->string(),
            'id_bidang_studi' => $this->string(),
            'nama_bidang_studi' => $this->string(),
            'id_jenjang_pendidikan' => $this->string(),
            'nama_jenjang_pendidikan' => $this->string(),
            'id_gelar_akademik' => $this->string(),
            'nama_gelar_akademik' => $this->string(),
            'id_perguruan_tinggi' => $this->string(),
            'nama_perguruan_tinggi' => $this->string(),
            'fakultas' => $this->string(),
            'tahun_lulus' => $this->string(),
            'sks_lulus' => $this->string(),
            'ipk' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%riwayat_pendidikan_dosen}}');
    }
}
