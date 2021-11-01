<?php
declare(strict_types=1);

namespace Jakala\ValueObjects;

use ValueObject;

class Boolean implements ValueObject, \Stringable
{
    protected const TRUE = true;
    protected const FALSE = false;

    public function __construct(protected ?bool $value = null, protected bool $nullable = true)
    {
        $this->setValue($value);
    }

    public function value(): ?bool
    {
        return $this->value ? self::TRUE : self::FALSE;
    }

    public function __toString(): string
    {
        return $this->value . '';
    }

    private function setValue(?bool $value): void
    {
        $this->validateNullableValue($value);
        $this->value = $value;
    }

    private function validateNullableValue(?bool $value): void
    {
        if (!$this->nullable && is_null($value)) {
            throw new InvalidBoolean($value);
        }
    }
}