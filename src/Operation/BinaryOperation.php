<?php

namespace Operation;

use Immutable;

abstract class BinaryOperation extends Immutable
{
    protected $left;
    protected $right;

    public function __construct(Immutable $left, Immutable $right)
    {
        $this->left = $left;
        $this->right = $right;
    }
}