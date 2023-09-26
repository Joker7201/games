<?php
//autoloader for my own classes

spl_autoload_register(static function ($class) {
    if (strpos($class, 'core\\') !== 0) {
        return;
    }

    $file = str_replace('\\', '/', $class) . '.php';

    if (file_exists($file)) {
        include $file;
    }

});

spl_autoload_register(static function ($class) {

    if (strpos($class, 'controller\\')!== 0) {
        return;
    }

    $file = str_replace('\\', '/', $class) . '.php';


    if (file_exists($file)) {
        include $file;
    }

});

/*spl_autoload_register(static function ($class) {

    $file = str_replace('\\', '/', $class) . '.php';
    $fileName = str_replace('\\', '/', $class) . '.php';

    if (file_exists($fileName)) {
        include $fileName;
    }

});*/

