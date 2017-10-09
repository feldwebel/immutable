<?php

namespace Currency;

use Immutable;

abstract class Currency extends Immutable {

    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function describe(): string
    {
        return $this->value . $this->getName();
    }

    public function collapse(): array
    {
        return
            [$this->getName() => $this->value];
    }

    protected function getName(): string
    {
        return strtoupper(substr(static::class, strrpos(static::class, '\\') + 1));
    }
}
