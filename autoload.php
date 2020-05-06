<?php

spl_autoload_register(function($nameClass)
{
    $dirName = "Classes";
    $filename = $dirName . DIRECTORY_SEPARATOR . $nameClass . ".php";

    if(file_exists($filename))
        require_once($filename);

    return false;
});