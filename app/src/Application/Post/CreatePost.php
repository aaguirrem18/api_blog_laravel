<?php

namespace App\src\Application\Post;

use App\src\Domain\Posts\Post;
use App\src\Domain\Posts\PostInterface;
use App\src\Domain\Posts\ValueObject\Title;
use App\src\Domain\Posts\ValueObject\Content;
use App\src\Domain\Posts\ValueObject\AuthorId;

final class CreatePost
{
    private $postRepository;

    public function __construct(
        PostInterface $postRepository
    ) {
        $this->postRepository = $postRepository;
    }

    public function execute(string $title, string $content, int $author_id)
    {

        $posts = new Post(
            new Title($title),
            new Content($content),
            new AuthorId($author_id)
        );

        $this->postRepository->save($posts);

        return $posts->toArray();
    }

}
