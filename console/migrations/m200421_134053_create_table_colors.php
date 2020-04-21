<?php

use yii\db\Migration;

/**
 * Handles the creation for table `{{%colors}}`.
 */
class m200421_134053_create_table_colors extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%colors}}', [

            'id' => $this->primaryKey()->notNull(),
            'name' => $this->string(100)->notNull(),

        ]);

        $this->batchInsert(
            'colors',
            ['name'],
            [
                ['зеленый'],
                ['желтый'],
                ['красный'],
            ]
        );
     }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%colors}}');
    }
}
