<?php

declare(strict_types=1);

namespace Jakala\ValueObjects;

use DateTime;
use Jakala\ValueObjects\Exception\InvalidNull;
use ValueObject;

class Time implements ValueObject, \Stringable
{
    public const DEFAULT_FORMAT = 'Y-m-d H:i:s';

    private function __construct(protected ?DateTime $value)
    {
        $this->setValue($value);
    }

    public static function createFromString(string $datetime): self
    {
        $value = Datetime::createFromFormat(self::DEFAULT_FORMAT, $datetime);
        return new self($value);
    }

    public function value(): mixed
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value->format(self::DEFAULT_FORMAT);
    }

    private function setValue(?DateTime $value): void
    {
        $this->validateNullableValue($value);
        $this->value = $value;
    }

    private static function validateNullableValue(?DateTime $value): void
    {
        if (is_null($value)) {
            throw new InvalidNull();
        }
    }
}
