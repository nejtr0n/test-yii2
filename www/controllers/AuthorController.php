<?php


namespace app\controllers;

use app\models\Author;
use yii\rest\ActiveController;

class AuthorController extends ActiveController
{
    public $modelClass = Author::class;
}