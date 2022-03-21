<?php

declare(strict_types=1);

namespace Jakala\ValueObjects;

use Jakala\ValueObjects\Exception\InvalidNull;
use Jakala\ValueObjects\Exception\InvalidUuid;
use Stringable;
use ValueObject;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid implements ValueObject, Stringable
{
    public function __construct(protected string $value)
    {
        $this->setValue($value);
    }

    public static function random(): self
    {
        return new self(RamseyUuid::uuid4()->toString());
    }

    public function value(): ?string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function equals(Uuid $other): bool
    {
        return $this->value === $other->value();
    }

    private function setValue(?string $value): void
    {
        $this->validateNotEmptyValue($value);
        $this->validateUuidValue($value);
        $this->value = $value;
    }

    private function validateNotEmptyValue(string $value): void
    {
        if (empty($value)) {
            throw new InvalidNull();
        }
    }

    private function validateUuidValue(?string $value): void
    {
        if (!RamseyUuid::isValid($value)) {
            throw new InvalidUuid($value);
        }
    }
}
