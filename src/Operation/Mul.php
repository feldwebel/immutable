<?php

namespace Operation;

final class Mul extends BinaryOperation {

    public function describe(): string
    {
        return '(' . $this->left->describe() . ')' . $this->getName() . $this->right->describe();
    }

    public function collapse(): array
    {
        $factor = $this->right->describe();

        return
            array_map(
                function($v) use ($factor) {return $v * $factor;},
                $this->left->collapse()
            );
    }

    protected function getName(): string
    {
        return ' * ';
    }
}