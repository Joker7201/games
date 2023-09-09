<?php
//autoloader for my own classes

spl_autoload_register(static function ($class) {


    $file = str_replace('\\', '/', $class) . '.php';
    $fileName = 'core' . '/' . $file;

    if (file_exists($fileName)) {
        include $fileName;
    }

});

spl_autoload_register(static function ($class) {

    $file = str_replace('\\', '/', $class) . '.php';
    $fileName = str_replace('\\', '/', $class) . '.php';

    if (file_exists($fileName)) {
        include $fileName;
    }

});

spl_autoload_register(static function ($class) {

    $file = str_replace('\\', '/', $class) . '.php';
    $fileName = str_replace('\\', '/', $class) . '.php';

    if (file_exists($fileName)) {
        include $fileName;
    }

});

