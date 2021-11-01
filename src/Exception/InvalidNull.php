<?php
declare(strict_types=1);

namespace Jakala\ValueObjects\Exception;

use Jakala\ValueObjects\Domain\ValueObject\DomainError;

final class InvalidNull extends DomainError
{
    public function code(): string
    {
        return 'invalid_null';
    }

    protected function message(): string
    {
        return 'Value cannot be <Null>';
    }
}