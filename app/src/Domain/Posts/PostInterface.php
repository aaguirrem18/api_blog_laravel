<?php

namespace App\src\Domain\Posts;

use App\src\Domain\Posts\Post;

interface PostInterface
{
    public function all();
    public function save(Post $post);
}
