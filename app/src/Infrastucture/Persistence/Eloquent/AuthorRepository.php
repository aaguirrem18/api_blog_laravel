<?php
namespace App\src\Infrastucture\Persistence\Eloquent;

use App\src\Domain\Authors\Author;
use App\src\Domain\Author\ValueObject\Name;
use App\src\Domain\Authors\AuthorInterface;
use App\src\Infrastucture\Persistence\Eloquent\AuthorEloquentModel;

class AuthorRepository implements AuthorInterface
{
    public function all()
    {
        $model = AuthorEloquentModel::get();

        if (is_null($model)) {
            return null;
        }

        return new Author(
            new Name($model->title)
        );
    }

    public function save(Author $author)
    {
        $model =  new AuthorEloquentModel();
        $model->name = $author->name->value();

        $model->save();
    }
}