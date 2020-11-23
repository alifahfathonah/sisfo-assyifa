<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%detail_biodata_dosen}}`.
 */
class m201122_145336_create_detail_biodata_dosen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%detail_biodata_dosen}}', [
            'id' => $this->primaryKey(),
            'id_dosen' => $this->string(),
            'nama_dosen' => $this->string(),
            'tempat_lahir' => $this->string(),
            'tanggal_lahir' => $this->string(),
            'jenis_kelamin' => $this->string(),
            'id_agama' => $this->string(),
            'nama_agama' => $this->string(),
            'id_status_aktif' => $this->string(),
            'nama_status_aktif' => $this->string(),
            'nidn' => $this->string(),
            'nama_ibu' => $this->string(),
            'nik' => $this->string(),
            'nip' => $this->string(),
            'npwp' => $this->string(),
            'id_jenis_sdm' => $this->string(),
            'no_sk_cpns' => $this->string(),
            'tanggal_sk_cpns' => $this->string(),
            'no_sk_pengangkatan' => $this->string(),
            'mulai_sk_pengangkatan' => $this->string(),
            'id_lembaga_pengangkatan' => $this->string(),
            'nama_lembaga_pengangkatan' => $this->string(),
            'id_pangkat_golongan' => $this->string(),
            'nama_pangkat_golongan' => $this->string(),
            'id_sumber_gaji' => $this->string(),
            'jalan' => $this->string(),
            'dusun' => $this->string(),
            'rt' => $this->string(),
            'rw' => $this->string(),
            'ds_kel' => $this->string(),
            'kode_pos' => $this->string(),
            'id_wilayah' => $this->string(),
            'nama_wilayah' => $this->string(),
            'telepon' => $this->string(),
            'handphone' => $this->string(),
            'email' => $this->string(),
            'status_pernikahan' => $this->string(),
            'nama_suami_istri' => $this->string(),
            'nip_suami_istri' => $this->string(),
            'tanggal_mulai_pns' => $this->string(),
            'id_pekerjaan_suami_istri' => $this->string(),
            'nama_pekerjaan_suami_istri' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%detail_biodata_dosen}}');
    }
}
