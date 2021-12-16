<?php
include_once('Services/FileManager.php');
$configs = include('config.php');


$fileManager = new \Services\FileManager($configs['input_path']);
var_dump( $fileManager->getContentInArray());