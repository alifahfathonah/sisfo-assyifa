<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%materi_items}}`.
 */
class m201004_154636_create_materi_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%materi_item}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'child_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-materi_item-parent_id',
            'materi_item',
            'parent_id'
        );

        $this->addForeignKey(
            'fk-materi_item-parent_id',
            'materi_item',
            'parent_id',
            'materi',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-materi_item-child_id',
            'materi_item',
            'child_id'
        );

        $this->addForeignKey(
            'fk-materi_item-child_id',
            'materi_item',
            'child_id',
            'materi',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%materi_items}}');
    }
}
