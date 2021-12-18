<?php

namespace Src\Services;

use Exception;
use PDO;
use Src\Services\Product;

class Shopcart
{

    public function __construct(Product $product, $amount)
    {
        if($product == null)
            throw new Exception('Product cannot be null');
        $this->items = [];
        $this->addItem($product, $amount);
    }


    public function addItem(Product $product, $amount)
    {
        $itemExistis = false;

        foreach($this->items as $id => $item){
            if($item['product']->equals($product)){
                
                if($item['product']->getPrice() != $product->getPrice())
                    return;

                $itemExistis = true;
                $this->items[$id]['amount'] += $amount;
                if($this->items[$id]['amount'] <= 0)
                    unset($this->items[$id]);
                break;
            }
            
        }

        if(!$itemExistis && $amount > 0)
            $this->items[] = ['product' => $product, 'amount' => $amount];
           
    }

    public function getTotalPrice(){
        $price = 0 ;
        foreach($this->items as $item){
            $price += $item['product']->getPrice()*$item['amount'];
        }
        return $price;
    }

    //for debugging purposes
    public function toString(){
        print_r($this->items);
    }


    public function getCountOfProduct($product){
        
        foreach($this->items as $item){
            if($item['product']->equals($product))
                return $item['amount'];
        }
        return 0;
    }

}
