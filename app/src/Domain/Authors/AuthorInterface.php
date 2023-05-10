<?php

namespace App\src\Domain\Authors;

use App\src\Domain\Authors\Author;

interface AuthorInterface
{
    public function all();
    public function save(Author $author);
}
