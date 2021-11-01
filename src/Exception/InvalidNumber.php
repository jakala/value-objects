<?php
declare(strict_types=1);

namespace Jakala\ValueObjects\Exception;

use Jakala\ValueObjects\Domain\ValueObject\DomainError;

final class InvalidNumber extends DomainError
{
    private mixed $value;

    public function __construct(mixed $value)
    {
        $this->value = $value;
        parent::__construct();
    }

    public function code(): string
    {
        return 'invalid_number';
    }

    protected function message(): string
    {
        return sprintf('Value <%s> is not a valid number value.', $this->value);
    }
}