<?php
namespace controller;

include 'core/autoload.php';


class UserController extends \core\mvc\ControllerBase
{
    public function indexAction(): void {

        $this->render('index.twig');
    }
}