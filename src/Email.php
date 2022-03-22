<?php

declare(strict_types=1);

namespace Jakala\ValueObjects;

use Jakala\ValueObjects\Exception\InvalidEmail;

class Email implements ValueObject, \Stringable
{
    public function __construct(protected string $value)
    {
        $this->setValue($value);
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    private function setValue(string $value): void
    {
        $this->validate($value);
        $this->value = $value;
    }

    private function validate(string $value): void
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmail($value);
        }
    }
}
