<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%prodi_nilai}}`.
 */
class m201101_092256_create_prodi_nilai_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%prodi_nilai}}', [
            'id' => $this->primaryKey(),
            'prodi_id' => $this->integer(),
            'nilai_huruf' => $this->string(),
            'nilai_index' => $this->double(),
            'bobot_min' => $this->double(),
            'bobot_max' => $this->double(),
            'tanggal_mulai' => $this->date(),
            'tanggal_akhir' => $this->date(),
        ]);

        $this->createIndex(
            'idx-prodi_nilai-prodi_id',
            'prodi_nilai',
            'prodi_id'
        );

        $this->addForeignKey(
            'fk-prodi_nilai-prodi_id',
            'prodi_nilai',
            'prodi_id',
            'prodi',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%prodi_nilai}}');
    }
}
