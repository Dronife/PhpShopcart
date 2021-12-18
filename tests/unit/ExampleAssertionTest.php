<?php

namespace Tests\unit;

class ExampleAssertionTest extends \PHPUnit\Framework\TestCase
{

    public function testThatStringsMatch(){
        $string = 'testing';
        $string1 = 'testing';

        $this->assertSame($string, $string1);
    }

}
