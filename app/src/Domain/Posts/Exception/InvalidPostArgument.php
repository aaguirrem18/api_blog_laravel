<?php

declare(strict_types=1);

namespace App\src\Domain\Posts\Exception;

use InvalidArgumentException;

final class InvalidPostArgument extends InvalidArgumentException
{
    public function __construct(string $message, $code = 0)
    {
        parent::__construct($message, $code);
    }
}
