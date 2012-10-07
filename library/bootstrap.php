<?php

set_include_path(
        get_include_path() . PATH_SEPARATOR .
        realpath('../library/')
        );

$autoloadFunction = function ($className) {
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    foreach (explode(PATH_SEPARATOR, get_include_path()) as $includePath) {
        $path = $includePath . DIRECTORY_SEPARATOR . $classPath . '.php';
        if (file_exists($path)) { require $path; return true;}
    }
    throw new Exception("Required Class {$className} Not Found");
};

spl_autoload_register($autoloadFunction);
