<?php

namespace Src\Services;

use Exception;

class Currency 
{
    public function __construct($amount, $exchange)
    {
        $this->config = include('config.php');
        $this->amount = $this->convertToDefault($amount, $exchange);
    }

    private function convertToDefault($amount, $exchange){

        $this->amountZeroOrBigger($amount);

        switch($exchange){
            case 'EUR':
                return $amount;
                break;
            case 'USD':
                return $this->getUSD($amount);
                break;
            case 'GBP':
                return $this->getGBP($amount);
                break;
            default :
                throw new Exception('No exchange for this pair');
        }
    }

    private function amountZeroOrBigger($amount){
        if($amount < 0)
        {
            throw new Exception('Amount of money need to be zero or bigger');
        }
    }

    public function setInstance($amount, $exchange){
        $this->amount = $this->convertToDefault($amount, $exchange);
    }

    public function getAmount(){
        return $this->amount;
    }

    private function getGBP($amount){
        return $amount*$this->config['eur:gbp'];
    }
    private function getUSD($amount){
        return $amount*$this->config['eur:usd'];
    }

}
