<?php
declare(strict_types=1);

namespace Jakala\ValueObjects;

use Jakala\ValueObjects\Exception\InvalidNull;
use ValueObject;

class Text implements ValueObject, \Stringable
{
    public function __construct(protected ?string $value, protected ?bool $nullable = false)
    {
        $this->setValue($value);
    }

    public function value(): ?string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string)$this->value;
    }

    private function setValue(?string $value): void
    {
        $this->validateNullValue($value);
        $this->value = $value;
    }

    private function validateNullValue(?string $value): void
    {
        if (!$this->nullable && empty($value)) {
            throw new InvalidNull();
        }
    }
}