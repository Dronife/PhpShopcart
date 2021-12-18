<?php

namespace Tests\Unit;

use Exception;
use PHPUnit\Framework\TestCase;
use Src\Services\Currency;
use Src\Services\Product;
use Src\Services\Shopcart;

class ShopcartTest extends TestCase
{
    public function testProductCount(){
        $product = new Product('test', 'test', new Currency(10, 'EUR'));
        $product1 = new Product('test1', 'test', new Currency(10, 'EUR'));
        $shopcart = new Shopcart($product, 2);
        $shopcart->addItem($product, -1);
        $shopcart->addItem($product1, 10);
        $this->assertSame($shopcart->getCountOfProduct($product), 1);
    }

}
