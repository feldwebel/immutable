<?php

use PHPUnit\Framework\TestCase;

class ImmutableTest extends TestCase
{
    const VALUE = 1234;

    /**
     * @test
     */
    public function simpleImmutableOperation()
    {
        $a = (CCY::RUB(10)->mul(5)->add(CCY::USD(5))->sub(CCY::RUB(3)))->mul(2);

        $this->assertEquals('((10RUB) * 5 + 5USD - 3RUB) * 2', $a->describe());
        $this->assertEquals(['RUB' => 94, 'USD' => 10], $a->collapse());
        $this->assertEquals(726.3, $a->asFloat(['RUB' => 1, 'USD' => 63.23]));
    }
}
