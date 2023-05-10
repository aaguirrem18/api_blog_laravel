<?php

namespace App\src\Application\Author;

use App\src\Domain\Authors\AuthorInterface;

final class GetAllAuthors
{
    private $authorRepository;

    public function __construct(
        AuthorInterface $authorRepository
    ) {
        $this->authorRepository = $authorRepository;
    }

    public function execute()
    {
        $posts = $this->authorRepository->all();
        return $posts;
    }
}
