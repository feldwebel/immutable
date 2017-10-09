<?php

namespace Operation;

final class Sub extends BinaryOperation {

    public function describe(): string
    {
        return $this->left->describe() . $this->getName() . $this->right->describe();
    }

    public function collapse(): array
    {
        $left = $this->left->collapse();

        foreach($this->right->collapse() as $currName => $val) {
            if (array_key_exists($currName, $left)) {
                $left[$currName] -= $val;
            } else {
                $left[$currName] = -$val;
            }
        }

        return $left;
    }

    protected function getName(): string
    {
        return ' - ';
    }
}
