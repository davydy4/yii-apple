<?php

use yii\db\Migration;

/**
 * Handles the creation for table `{{%apples}}`.
 */
class m200421_134144_create_table_apples extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%apples}}', [

            'id' => $this->primaryKey()->notNull(),
            'size' => $this->double(5)->defaultValue(100),
            'status' => $this->tinyInteger(4)->defaultValue(1),
            'color_id' => $this->integer(11),
            'created_at' => $this->integer(11),
            'fell_at' => $this->integer(11),

        ]);
 
        // creates index for column `color_id`
        $this->createIndex(
            'FK_apples_colors',
            '{{%apples}}',
            'color_id'
        );

        // add foreign key for table `colors`
        $this->addForeignKey(
            'FK_apples_colors',
            '{{%apples}}',
            'color_id',
            '{{%colors}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        // drops foreign key for table `colors`
        $this->dropForeignKey(
            'FK_apples_colors',
            '{{%apples}}'
        );

        // drops index for column `color_id`
        $this->dropIndex(
            'FK_apples_colors',
            '{{%apples}}'
        );

        $this->dropTable('{{%apples}}');
    }
}
