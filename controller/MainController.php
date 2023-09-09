<?php


use core\mvc\ControllerBase;

include 'core/autoload.php';

class MainController extends \core\mvc\ControllerBase
{
    public function indexAction(): void {
       $this->render('index.twig');
    }
}