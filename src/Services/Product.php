<?php

namespace Src\Services;

use Src\Services\Currency;

class Product
{
    public function __construct($identifier, $name, Currency $currency = null)
    {
        $this->identifier = $identifier;
        $this->name = $name;
        $this->currency = $currency;
    }

    public function setIdentifier($identifier){
        $this->identifier = $identifier;
    }

    public function setName($name){
        $this->name = $name;
    }
    public function setCurrency(Currency $currency){
        $this->currency = $currency;
    }

    public function getIdentifier(){
        return $this->identifier;
    }
    public function getName(){
        return $this->name;
    }
    public function getCurrency(){
        return $this->currency->getAmount();
    }

    public function equals($other){
        return ($this->identifier == $other->getIdentifier() && $this->name == $other->getName() );
    }
}
