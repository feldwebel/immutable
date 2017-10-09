<?php

namespace Operation;

use Immutable;

final class Factor extends Immutable
{
    protected $factor;

    public function __construct(int $factor)
    {
        $this->factor = $factor;
    }

    public function describe(): string
    {
        return $this->factor;
    }

    public function collapse(): array
    {
        throw new Exception("Undefined");
    }

    public function asFloat(array $rates): float
    {
        throw new Exception("Undefined");
    }

    protected function getName(): string
    {
        return (string) $this->factor;
    }
}
