<?php

declare(strict_types=1);

namespace App\src\Domain\Posts\ValueObject;

use App\src\Domain\Posts\Exception\InvalidPostArgument;

final class Content
{
    private $content;

    public function __construct(string $content)
    {
        $this->validate($content);
        $this->content = $content;
    }

    /**
     * content
     *
     * @return bool
     */
    public function value(): string
    {
        return $this->content;
    }

    private function validate(string $content)
    {
        if (empty($content)) {
            throw new InvalidPostArgument('content cannot be an empty string');
        }

        $this->content = $content;
    }
}
