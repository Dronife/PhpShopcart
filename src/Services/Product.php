<?php

namespace Src\Services;

use Src\Services\Currency;

class Product
{
    public function __construct($identifier, $name, $price = null)
    {
        $this->identifier = $identifier;
        $this->name = $name;
        $this->price =$price;
    }

    public function setIdentifier($identifier){
        $this->identifier = $identifier;
    }

    public function setName($name){
        $this->name = $name;
    }
    public function setPrice($price){
        $this->price = $price;
    }

    public function getIdentifier(){
        return $this->identifier;
    }
    public function getName(){
        return $this->name;
    }
    public function getPrice(){
        return $this->price;
    }

    public function equals($other){
        if($this->identifier == $other->getIdentifier() && $this->name == $other->getName()){
            if($other->getPrice() <= 0 || $other->getPrice() == null)
                return true;
            return $this->price == $other->getPrice();
        }
        return False;
            
    }
}
