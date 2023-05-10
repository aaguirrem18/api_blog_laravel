<?php

namespace App\src\Application\Author;

use App\src\Domain\Authors\Author;
use App\src\Domain\Author\ValueObject\Name;
use App\src\Domain\Authors\AuthorInterface;

final class CreateAuthor
{
    private $authorRepository;

    public function __construct(
        AuthorInterface $authorRepository
    ) {
        $this->authorRepository = $authorRepository;
    }

    public function execute(string $name)
    {

        $Authors = new Author(
            new Name($name)
        );

        $this->authorRepository->save($Authors);

        return $Authors;
    }

}
