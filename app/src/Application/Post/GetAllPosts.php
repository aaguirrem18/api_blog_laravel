<?php

namespace App\src\Application\Post;

use App\src\Domain\Posts\PostInterface;

final class GetAllPosts
{
    private $postRepository;

    public function __construct(
        PostInterface $postRepository
    ) {
        $this->postRepository = $postRepository;
    }

    public function execute()
    {
        $posts = $this->postRepository->all();
        return $posts;
    }
}
