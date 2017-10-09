<?php

use Operation\Add;
use Operation\Factor;
use Operation\Mul;
use Operation\Sub;

abstract class Immutable
{
    public function mul(int $factor): Immutable
    {
        return new Mul($this, new Factor($factor));
    }

    public function add(Immutable $sum): Immutable
    {
        return new Add($this, $sum);
    }

    public function sub(Immutable $sub): Immutable
    {
        return new Sub($this, $sub);
    }

    abstract public function describe(): string;

    abstract public function collapse(): array;

    public function asFloat(array $rates): float
    {
        $data = $this->collapse();
        $result = .0;

        foreach ($rates as $name => $value) {
            if (array_key_exists($name, $data)) {
                $result += $data[$name] * $value;
                unset($data[$name]);
            }
        }
        if (!empty($data)) {
            throw new \Exception("It seems some rates to be lack!");
        }
        return $result;
    }

    abstract protected function getName(): string;

    public function __toString()
    {
        return $this->describe();
    }
}