<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%prodi}}`.
 */
class m201201_053810_add_dosen_id_column_to_prodi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%prodi}}', 'dosen_id', $this->integer());

        $this->createIndex(
            'idx-prodi-dosen_id',
            'prodi',
            'dosen_id'
        );

        $this->addForeignKey(
            'fk-prodi-dosen_id',
            'prodi',
            'dosen_id',
            'dosen',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%prodi}}', 'dosen_id');
    }
}
