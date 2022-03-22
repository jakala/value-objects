<?php

declare(strict_types=1);

namespace Jakala\ValueObjects;

class Text implements ValueObject, \Stringable
{
    public function __construct(protected string $value)
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

    private function setValue(string $value): void
    {
        $this->value = $value;
    }
}
