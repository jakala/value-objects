<?php
declare(strict_types=1);

namespace Jakala\ValueObjects\Exception;

use Jakala\ValueObjects\Domain\ValueObject\DomainError;

final class InvalidUuid extends DomainError
{
    private string $value;

    public function __construct(?string $value)
    {
        $this->value = is_null($value) ? 'NULL' : $value;
        parent::__construct();
    }

    public function code(): string
    {
        return 'invalid_uuid';
    }

    protected function message(): string
    {
        return sprintf('String <%s> is not a valid Uuid.', $this->value);
    }
}