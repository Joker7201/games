<?php
spl_autoload_register(static function ($className) {
    if (strpos($className, 'core\\') !== 0) {
        return;
    }
    $fileName = str_replace('\\',DIRECTORY_SEPARATOR,$className).'.php';
    if (file_exists(ROOT.'/'.$fileName)) {
        include ROOT.'/'.$fileName;
    }
});

spl_autoload_register(static function ($className) {
    if (strpos($className, 'controller\\')!== 0) {
        return;
    }
    $fileName = str_replace('\\',DIRECTORY_SEPARATOR,$className).'.php';
    if (file_exists(ROOT.'/'.$fileName)) {
        include ROOT.'/'.$fileName;
    }
});

spl_autoload_register(static function ($className) {
    $fileName = str_replace('\\',DIRECTORY_SEPARATOR,$className).'.php';
    if (file_exists(ROOT.'/'.$fileName)) {
        include ROOT.'/'.$fileName;
    }
});