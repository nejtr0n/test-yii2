<?php


namespace app\models;

use yii\db\ActiveRecord;

class Book extends ActiveRecord
{
    public function rules()
    {
        return [
            [['name'], 'string'],
        ];
    }

    public function getAuthors()
    {
        return $this->hasMany(Author::class,['id' => 'author_id'])
            ->viaTable('author_book', ["book_id" => "id"]);
    }
}