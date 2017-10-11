<?php

namespace Currency;

use PHPUnit\Framework\TestCase;


class CurrencyTest extends TestCase
{
    const VALUE = 1234;

    /**
     * @test
     */
    public function currencyDefaultBehaviour()
    {
        $rub = new Rub(self::VALUE);

        $this->assertEquals(self::VALUE.'RUB', $rub->describe());
        $this->assertArrayHasKey('RUB' , $rub->collapse());
    }
}