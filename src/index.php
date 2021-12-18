<?php

use Src\Services\Currency;
use Src\Services\FileManager;
use Src\Services\Product;
use Src\Services\Shopcart;

include_once('Services/FileManager.php');
include_once('Services/Shopcart.php');
include_once('Services/Currency.php');
include_once('Services/Product.php');
$configs = include('./config.php');


$fileManager = new FileManager($configs['input_path']);
$shopcart = new Shopcart();
foreach($fileManager->getContentInArray() as $components){
    $price = (!empty($components[3])) ? (new Currency($components[3], $components[4]))->getAmount():null;
    $product = new Product( $components[0],  $components[1], $price);
    $shopcart->addItem($product, $components[2]);
}
echo "Total shopcart sum: ".$shopcart->getTotalPrice()." Eur\n";
