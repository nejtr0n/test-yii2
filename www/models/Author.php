<?php

namespace app\models;

use yii\db\ActiveRecord;

class Author extends ActiveRecord
{
    public function rules()
    {
        return [
            [['name'], 'string'],
        ];
    }

    public function getBooks()
    {
        return $this->hasMany(Book::class,['id' => 'book_id'])
            ->viaTable('author_book', ["author_id" => "id"]);
    }
}