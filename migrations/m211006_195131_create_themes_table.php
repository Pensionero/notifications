<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%themes}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m211006_195131_create_themes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%themes}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'content' => $this->text(),
            'date' => $this->date(),
            'image' => $this->string(),
            'user_id' => $this->integer()->notNull(),
            'viewed' => $this->integer(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-themes-user_id}}',
            '{{%themes}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-themes-user_id}}',
            '{{%themes}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-themes-user_id}}',
            '{{%themes}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-themes-user_id}}',
            '{{%themes}}'
        );

        $this->dropTable('{{%themes}}');
    }
}
