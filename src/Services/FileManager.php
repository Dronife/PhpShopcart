<?php

namespace Src\Services;

use Exception;
use Throwable;

class FileManager
{
    public function __construct($file, $separator = ';')
    {
        $this->file = $file;
        $this->separator = $separator;
    }

    public function getFilePath(): string
    {
        return $this->file;
    }

    public function getContentInArray()
    {
        $raw_content = $this->getFileContents();
        $array_content = [];
        try {
            while (($line = fgets($raw_content)) !== false) {
                $components = explode( $this->separator, $line);
                $array_content[] = $components;
            }
            fclose($raw_content);
        } catch (Throwable $e) {
            print 'Something went wrong parsing file';
        }

        return  $array_content;
    }

    

    private function getFileContents()
    {
        $this->fileExists();
        
        try {
            return fopen($this->file, "r");
        } catch (Throwable $e) {
            print "File was not set. \n";
        }
    }

    private function fileExists()
    {
        if (!file_exists($this->file)) {
            throw new Exception("File does not exist");

        }

    }

}
