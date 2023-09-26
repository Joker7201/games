<?php


include 'core/autoload.php';
require_once 'core/Routing.php';
require_once 'core/__init.php';

$routing = new core\Routing();

$routing->handle();

