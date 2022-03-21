<?php

declare(strict_types=1);

namespace Jakala\ValueObjects\Exception;

use Jakala\ValueObjects\Domain\ValueObject\DomainError;

final class InvalidBoolean extends DomainError
{
    private ?bool $value;

    public function __construct(?bool $value)
    {
        $this->value = $value;
        parent::__construct();
    }

    public function code(): string
    {
        return 'invalid_boolean';
    }

    protected function message(): string
    {
        return sprintf('Value <%s> is not a valid boolean value.', $this->value);
    }
}
