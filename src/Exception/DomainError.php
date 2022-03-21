<?php

declare(strict_types=1);

namespace Jakala\ValueObjects\Domain\ValueObject;

use Jakala\ValueObjects\Exception\Exception;

abstract class DomainError extends \DomainException implements Exception
{
    public function __construct()
    {
        parent::__construct($this->message());
    }

    abstract public function code(): string;

    abstract protected function message(): string;
}
