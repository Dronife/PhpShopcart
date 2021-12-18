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
