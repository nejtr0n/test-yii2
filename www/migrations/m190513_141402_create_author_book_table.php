<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%author_book}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%author}}`
 * - `{{%book}}`
 */
class m190513_141402_create_author_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%author_book}}', [
            'author_id' => $this->integer()->notNull(),
            'book_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `author_id`
        $this->createIndex(
            '{{%idx-author_book-author_id}}',
            '{{%author_book}}',
            'author_id'
        );

        // add foreign key for table `{{%author}}`
        $this->addForeignKey(
            '{{%fk-author_book-author_id}}',
            '{{%author_book}}',
            'author_id',
            '{{%author}}',
            'id',
            'CASCADE'
        );

        // creates index for column `book_id`
        $this->createIndex(
            '{{%idx-author_book-book_id}}',
            '{{%author_book}}',
            'book_id'
        );

        // add foreign key for table `{{%book}}`
        $this->addForeignKey(
            '{{%fk-author_book-book_id}}',
            '{{%author_book}}',
            'book_id',
            '{{%book}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%author}}`
        $this->dropForeignKey(
            '{{%fk-author_book-author_id}}',
            '{{%author_book}}'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            '{{%idx-author_book-author_id}}',
            '{{%author_book}}'
        );

        // drops foreign key for table `{{%book}}`
        $this->dropForeignKey(
            '{{%fk-author_book-book_id}}',
            '{{%author_book}}'
        );

        // drops index for column `book_id`
        $this->dropIndex(
            '{{%idx-author_book-book_id}}',
            '{{%author_book}}'
        );

        $this->dropTable('{{%author_book}}');
    }
}
