<?php

declare(strict_types=1);

namespace Jakala\ValueObjects;

interface ValueObject
{
    public function value(): mixed;
}
