<?php
declare(strict_types=1);

namespace Jakala\ValueObjects;

use Jakala\ValueObjects\Exception\InvalidNull;
use Jakala\ValueObjects\Exception\InvalidNumber;
use ValueObject;

class Number implements ValueObject, \Stringable
{
    public function __construct(protected mixed $value, protected ?bool $nullable = false)
    {
        $this->setValue($value);
    }

    public function value(): ?int
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string)$this->value;
    }

    private function setValue(mixed $value): void
    {
        $this->validateNullableValue($value);
        $this->validateIsNumber($value);
        $this->value = $value;
    }

    private function validateNullableValue(mixed $value): void
    {
        if (!$this->nullable && is_null($value)) {
            throw new InvalidNull();
        }
    }

    private function validateIsNumber(mixed $value): void
    {
        if(!$this->nullable && !is_numeric($value)) {
            throw new InvalidNumber($value);
        }
    }
}