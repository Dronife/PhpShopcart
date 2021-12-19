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
        $product = new Product('test', 'test', 10);
        $product1 = new Product('test1', 'test', 22);
        $shopcart = new Shopcart();
        $shopcart->addItem($product, 2);
        $shopcart->addItem($product, -1);
        $shopcart->addItem($product1, 10);
        $this->assertSame($shopcart->getCountOfProduct($product), 1);
    }

    public function testProductCountWhenProductDoesNotExist(){
        $product = new Product('test', 'test', 10);
        $shopcart = new Shopcart();
        $shopcart->addItem($product, 2);
        $shopcart->addItem($product, -2);
        $this->assertSame($shopcart->getCountOfProduct($product), 0);
    }

    public function testGetTotalCarPrice(){
        $price = (new Currency(10, 'EUR'))->getAmount();
        $product = new Product('product', 'product', $price);
        
        $shopcart = new Shopcart();
        $shopcart->addItem($product, 2); 
        $shopcart->addItem($product, -1); 

        $product1 = new Product('product1', 'product1', 22);

        $price2 = (new Currency(88, 'GBP'))->getAmount();
        $product2 = new Product('product2', 'product2', $price2);

        $shopcart->addItem($product1, 10); 
        $shopcart->addItem($product2, 1);  

        //22*10 + 100*1 + 1*10 = 330
        $this->assertSame(round($shopcart->getTotalPrice()), round(330));
    }

}
