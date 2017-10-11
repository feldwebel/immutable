<?php

use PHPUnit\Framework\TestCase;

class ImmutableTest extends TestCase
{
    const
        SIMPLE_DESCRIBE = '((10RUB) * 5 + 5USD - 3RUB) * 2',
        SIMPLE_COLLAPSE = ['RUB' => 94, 'USD' => 10],
        SIMPLE_COURSE   = ['RUB' => 1, 'USD' => 63.23],
        SIMPLE_ASFLOAT  = 726.3
    ;

    /**
     * @test
     */
    public function simpleImmutableOperation()
    {
        $a = (CCY::RUB(10)->mul(5)->add(CCY::USD(5))->sub(CCY::RUB(3)))->mul(2);

        $this->assertEquals(self::SIMPLE_DESCRIBE, $a->describe());
        $this->assertEquals(self::SIMPLE_COLLAPSE, $a->collapse());
        $this->assertEquals(self::SIMPLE_ASFLOAT,  $a->asFloat(self::SIMPLE_COURSE));
    }
}
