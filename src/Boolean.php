<?php
declare(strict_types=1);

namespace Jakala\ValueObjects;

use Jakala\ValueObjects\Exception\InvalidBoolean;
use Jakala\ValueObjects\Exception\InvalidNull;
use ValueObject;

class Boolean implements ValueObject, \Stringable
{
    protected ?bool $internalValue;

    protected const TRUE = true;
    protected const FALSE = false;

    public function __construct(protected mixed $value = null, protected bool $nullable = true)
    {
        $this->setValue($value);
    }

    public function value(): mixed
    {
        return $this->value ? self::TRUE : self::FALSE;
    }

    public function __toString(): string
    {
        return $this->value . '';
    }

    private function setValue(mixed $value): void
    {
        $this->validateNullableValue($value);
        $this->validateBooleanValue($value);
        $this->value = $value;
    }

    private function validateNullableValue(mixed $value): void
    {
        if (!$this->nullable && is_null($value)) {
            throw new InvalidNull();
        }
    }

    private function validateBooleanValue(mixed $value): void
    {
        match($value) {
            null, self::FALSE, self::TRUE => 1,
            default => throw new InvalidBoolean($value)
        };
    }
}