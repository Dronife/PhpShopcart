<?php

namespace Tests\Unit;

use Exception;
use PHPUnit\Framework\TestCase;
use Src\Services\Currency;
use Src\Services\Product;

class ProductTest extends TestCase
{
    public function setUp() : void
    {
        $this->config = include('./config.php');
        $this->identifier = 'zen';
        $this->name = 'Asus Zenbook';
        $this->price = 99.99;

    }

    public function testSameProduct(){
        $product = new Product( $this->identifier,  $this->name , $this->price);
        $this->assertSame($product->equals($product), True);

        $product1 = new Product( $this->identifier,  $this->name , null);
        $this->assertSame($product->equals($product1), True);
    }

    public function testNotSameProducts(){
        $product = new Product( $this->identifier,  $this->name , $this->price);
        $product2 = new Product( $this->identifier,  'test' , $this->price);
        $this->assertSame($product->equals($product2), False);

        $product2 = new Product( $this->identifier,  'test' , -10);
        $this->assertSame($product->equals($product2), False);
    }

    public function testSuccessfullyGetIdentifier(){
        $product = new Product( $this->identifier,  $this->name , $this->price);
        $this->assertSame($product->getIdentifier(), $this->identifier);
    }
    public function testSuccessfullyGetName(){
        $product = new Product( $this->identifier,  $this->name , $this->price);
        $this->assertSame($product->getName(), $this->name);
    }
    public function testSuccessfullyGetCurrency(){
        $product = new Product( $this->identifier,  $this->name , $this->price);
        $this->assertSame($product->getPrice(), $this->price);
    }
    public function testSuccessfullySetIdentifier(){
        $identifier = 'test';
        $product = new Product( $this->identifier,  $this->name , $this->price);
        $product->setIdentifier($identifier);
        $this->assertSame($product->getIdentifier(),  $identifier);
    }
    public function testSuccessfullySetName(){
        $name = 'test';
        $product = new Product( $this->identifier,  $this->name , $this->price);
        $product->setName($name);
        $this->assertSame($product->getName(),  $name);
    }
    public function testSuccessfullySetCurrency(){
        $price = 10;
        $product = new Product( $this->identifier,  $this->name , $this->price);
        $product->setPrice($price);
        $this->assertSame($product->getPrice(),  $price);
    }
}
