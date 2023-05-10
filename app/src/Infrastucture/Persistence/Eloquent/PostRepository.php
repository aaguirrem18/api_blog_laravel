<?php

namespace App\src\Infrastucture\Persistence\Eloquent;

use App\src\Domain\Posts\Post;
use App\src\Domain\Posts\PostInterface;
use App\src\Domain\Posts\ValueObject\Title;
use App\src\Domain\Posts\ValueObject\Content;
use App\src\Domain\Posts\ValueObject\AuthorId;
use App\src\Infrastucture\Persistence\Eloquent\PostEloquentModel;

final class PostRepository implements PostInterface
{
    public function all()
    {
        $model = PostEloquentModel::get();

        if (is_null($model)) {
            return null;
        }

        return new Post(
            new Title($model->title),
            new Content($model->content),
            new AuthorId($model->author_id),
        );
    }

    public function save(Post $post)
    {
        $model =  new PostEloquentModel();
        $model->title = $post->getTitle()->value();
        $model->content = $post->getContent()->value();
        $model->author_id = $post->getAuthor()->value();

        $model->save();
    }
}

