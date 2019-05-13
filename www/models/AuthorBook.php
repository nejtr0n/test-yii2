<?php


namespace app\models;

use yii\db\ActiveRecord;

class AuthorBook extends ActiveRecord
{

    public function getAuthor() {
        return $this->hasOne(Author::class, ['id' => 'author_id']);
    }

    public function getBook() {
        return $this->hasOne(Book::class, ['id' => 'book_id']);
    }
}