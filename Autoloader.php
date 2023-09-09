<?php

class Autoloader
{
    public $namespace;
    public function __construct()
    {
        $this->namespace = '';
    }

    public  function register()
    {

    }

    public function load_class($class_name)
    {

    }
}

spl_autoload_register();