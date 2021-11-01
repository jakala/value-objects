<?php
declare(strict_types=1);

namespace Jakala\ValueObjects\Exception;

use Jakala\ValueObjects\Domain\ValueObject\DomainError;

final class InvalidEmail extends DomainError
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
        parent::__construct();
    }

    public function code(): string
    {
        return 'invalid_email';
    }

    protected function message(): string
    {
        return sprintf('Value <%s> is not a valid email address.', $this->value);
    }

}