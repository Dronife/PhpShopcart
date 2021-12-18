<?php

use Src\Services\FileManager;

include_once('Services/FileManager.php');
$configs = include('./../config.php');


$fileManager = new FileManager($configs['input_path_local']);
var_dump( $fileManager->getContentInArray());