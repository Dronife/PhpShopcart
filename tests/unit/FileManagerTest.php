<?php

namespace Tests\Unit;

use Exception;
use PHPUnit\Framework\TestCase;
use Src\Services\FileManager;

class FileManagerTest extends TestCase
{
    public function setUp() : void
    {
        $this->config = include('./config.php');
    }

    public function testSuccessfullFilePathSave(){
        $fileManager = new FileManager($this->config['input_path']);
        $this->assertSame($fileManager->getFilePath(), $this->config['input_path']);
    }

    public function testFindFileAndReturnsArray(){
        $fileManager = new FileManager($this->config['input_path']);
        $this->assertIsArray($fileManager->getContentInArray());
    }
   
    public function testCannotFindFile(){
        $fileManager = new FileManager('./fileDoesNotExist.txt');
        $this->expectException(Exception::class);
        $this->assertIsArray($fileManager->getContentInArray());
    }
    
    public function testFailsToParseFiveAttributesWithWrongSeparator(){
        $fileManager = new FileManager($this->config['input_path'], ',');
        $this->assertIsArray($fileManager->getContentInArray());
        $this->assertSame(count($fileManager->getContentInArray()[0]),1);
        
    }
   

}
