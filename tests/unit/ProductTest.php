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
        $this->currency = new Currency(99.99, 'EUR');

    }

    public function testSuccessfullyGetIdentifier(){
        $product = new Product( $this->identifier,  $this->name , $this->currency);
        $this->assertSame($product->getIdentifier(), $this->identifier);
    }
    public function testSuccessfullyGetName(){
        $product = new Product( $this->identifier,  $this->name , $this->currency);
        $this->assertSame($product->getName(), $this->name);
    }
    public function testSuccessfullyGetCurrency(){
        $product = new Product( $this->identifier,  $this->name , $this->currency);
        $this->assertSame($product->getCurrency(), $this->currency->getAmount());
    }
    public function testSuccessfullySetIdentifier(){
        $identifier = 'test';
        $product = new Product( $this->identifier,  $this->name , $this->currency);
        $product->setIdentifier($identifier);
        $this->assertSame($product->getIdentifier(),  $identifier);
    }
    public function testSuccessfullySetName(){
        $name = 'test';
        $product = new Product( $this->identifier,  $this->name , $this->currency);
        $product->setName($name);
        $this->assertSame($product->getName(),  $name);
    }
    public function testSuccessfullySetCurrency(){
        $currency = new Currency(1, 'USD');
        $product = new Product( $this->identifier,  $this->name , $this->currency);
        $product->setCurrency($currency);
        $this->assertSame($product->getCurrency(),  $currency->getAmount());
    }
}
