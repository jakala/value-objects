<?php

declare(strict_types=1);

use Jakala\ValueObjects;

interface ValueObject
{
    public function value(): mixed;
}
