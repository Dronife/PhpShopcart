<?php

namespace Tests\Unit;

use Exception;
use PHPUnit\Framework\TestCase;
use Src\Services\Currency;

class CurrencyTest extends TestCase
{
    public function setUp() : void
    {
        $this->config = include('./config.php');
    }

    public function testConvertionToEurosFromEuros(){
        $initValue = 1;
        $currency = new Currency($initValue, 'EUR');
        $this->assertSame($currency->getAmount(), $initValue);
    }

    public function testConvertionToEurosFromUSD(){
        $initValue = 1;
        $currency = new Currency($initValue, 'USD');
        $this->assertSame($currency->getAmount(), $initValue*$this->config['eur:usd']);
    }
    public function testConvertionToEurosFromGBP(){
        $initValue = 1;
        $currency = new Currency($initValue, 'GBP');
        $this->assertSame($currency->getAmount(), $initValue*$this->config['eur:gbp']);
    }
    public function testFailsToGetExchange(){
        $initValue = 1;
        $this->expectException(Exception::class);
        $currency = new Currency($initValue, 'DOES NOT EXIST');
    }
    public function testFailsOnNegativeAmount(){
        $initValue = -1;
        $this->expectException(Exception::class);
        $currency = new Currency($initValue, 'GBP');
    }

    public function setCurrency() {
        $initValue = 1;
        $currency = new Currency($initValue, 'USD');
        $newValue = 10;
        $currency->setInstance($newValue, 'USD');
        $this->assertSame($currency->getAmount(), $newValue*$this->config['eur:usd']);
    }
}
