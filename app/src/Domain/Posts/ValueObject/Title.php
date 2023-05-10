<?php

declare(strict_types=1);

namespace App\src\Domain\Posts\ValueObject;

use App\src\Domain\Posts\Exception\InvalidPostArgument;

final class Title
{
    private string $title;

    public function __construct(string $title)
    {
        $this->validate($title);
        $this->title = $title;
    }

    /**
     * getTitle
     *
     * @return string
     */
    public function value(): string
    {
        return $this->title;
    }

    private function validate(string $title)
    {
        if (empty($title)) {
            throw new InvalidPostArgument('title cannot be an empty string');
        }

        $this->title = $title;
    }

}
