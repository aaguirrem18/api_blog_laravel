<?php

declare(strict_types=1);

namespace App\src\Domain\Posts\ValueObject;

use App\src\Domain\Posts\Exception\InvalidPostArgument;

final class AuthorId
{

    private $author;

    public function __construct(int $author)
    {
        $this->validate($author);
        $this->author = $author;
    }

    /**
     * author
     *
     * @return int
     */
    public function value(): int
    {
        return $this->author;
    }

    private function validate(int $author)
    {
        if ($author === 0) {
            throw new InvalidPostArgument('Author ID is not valid', 400);
        }
    
        $this->author = $author;
    }

}
