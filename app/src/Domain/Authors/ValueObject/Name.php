<?php

declare(strict_types=1);

namespace App\src\Domain\Author\ValueObject;

final class Name
{

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * name
     *
     * @return string
     */
    public function value(): string
    {
        return $this->name;
    }
}
