<?php

namespace app\commands;

use app\models\Author;
use app\models\Book;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\db\Exception;

class SeedController extends Controller
{
    public function actionIndex()
    {
        Yii::$app->db->transaction(function(){
            $author1 = new Author();
            $author1->setIsNewRecord(true);
            $author1->name = 'Джордж Оруэлл';
            if (!$author1->save()){
                $this->error($author1->getFirstErrors());
            }

            $book1 = new Book();
            $book1->name = '1984';
            $book1->setIsNewRecord(true);
            if (!$book1->save()){
                $this->error($author1->getFirstErrors());
            }

            $book2 = new Book();
            $book2->name = 'Скотный двор ';
            $book2->setIsNewRecord(true);
            if (!$book2->save()){
                $this->error($author1->getFirstErrors());
            }

            $author1->link('books', $book1);
            $author1->link('books', $book2);

            $author2 = new Author();
            $author2->setIsNewRecord(true);
            $author2->name = 'Джордж Оруэлл';
            if (!$author2->save()){
                $this->error($author2->getFirstErrors());
            }

            $book3 = new Book();
            $book3->name = 'Оккультизм и сексуальность';
            $book3->setIsNewRecord(true);
            if (!$book3->save()){
                $this->error($author1->getFirstErrors());
            }
            $author2->link('books', $book3);
        });

        echo "Seeding OK!\r\n";

        return ExitCode::OK;

    }

    private function error($error) {
        throw new Exception(sprintf("Seeder error %s", $error));
    }
}