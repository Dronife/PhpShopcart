<?php

namespace Tests\Unit;

use Exception;
use PHPUnit\Framework\TestCase;
use Src\Services\Currency;
use Src\Services\Product;
use Src\Services\Shopcart;

class ShopcartTest extends TestCase
{
    public function testSuccesfullyAddOneProduct(){
        $product = new Product('test', 'test', new Currency(10, 'EUR'));
        $shopcart = new Shopcart($product);
        $this->assertSame($shopcart->getLastProduct(), $product);
    }
    public function testSuccesfullyAddProducts(){
        $product = new Product('test', 'test', new Currency(10, 'EUR'));
        $shopcart = new Shopcart($product);
        $product1 = new Product('test1', 'test1', new Currency(10, 'EUR'));
        $shopcart->addItem($product1);
        $product2 = new Product('test12', 'test12', new Currency(10, 'EUR'));
        $shopcart->addItem($product2);
        $this->assertSame($shopcart->getItemCount(), 3);
    }
    public function testCountOf(){
        $identifier = 'test1';
        $product = new Product($identifier, 'test2', new Currency(10, 'EUR'));
        $shopcart = new Shopcart($product);
        $product1 = new Product($identifier, 'test', new Currency(10, 'EUR'));
        $shopcart->addItem($product1);
        $this->assertSame($shopcart->getCountOfSameIdentifier('test1'), 2);
    }

}
