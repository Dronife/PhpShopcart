<?php

namespace Src\Services;

use Exception;
use PDO;
use Src\Services\Product;

class Shopcart
{

    public function __construct(Product $product)
    {
        if($product == null)
            throw new Exception('Product cannot be null');
        $this->items = [$product];
    }

    public function getLastProduct(){
        return end($this->items);
    }

    public function addItem(Product $product)
    {
        $this->items[] = $product;
    }

    public function getItemCount(){
        return count($this->items);
    }

    public function getCountOfSameIdentifier($identifier){
        $count = 0;
        foreach($this->items as $item){
            if($item->getidentifier() == $identifier)
                $count++;
        }
        return $count;
    }

}
