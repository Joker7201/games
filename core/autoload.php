<?php
 //autoloader for my own classes

spl_autoload_register(static function ($class) {
    //includes classes from the directory 'controller'
    /*$file = 'controller/'.$class.'.php';
     if (file_exists($file)) {
         require 'controller/'.$class.'.php';
     }*/

    if (strpos($class, 'core\\') !== 0) {
        return;
    }
    $fileName = str_replace('\\',DIRECTORY_SEPARATOR,$class).'.php';
    if (file_exists(ROOT.'/'.$fileName)) {
        include ROOT.'/'.$fileName;
    }
});

spl_autoload_register(static function ($class) {
    if (strpos($class, 'controller\\')!== 0) {
        return;
    }
    $fileName = str_replace('\\',DIRECTORY_SEPARATOR,$class).'.php';
    if (file_exists(ROOT.'/'.$fileName)) {
        include ROOT.'/'.$fileName;
    }
});

spl_autoload_register(static function ($class) {
    $fileName = str_replace('\\',DIRECTORY_SEPARATOR,$class).'.php';
    if (file_exists(ROOT.'/'.$fileName)) {
        include ROOT.'/'.$fileName;
    }



});

