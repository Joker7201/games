<?php

include 'core/autoload.php';


class LoginController extends \core\mvc\ControllerBase
{
    public function indexAction(): void {
        $base = new ControllerBase();

        $path = 'user';
        $twig = $base->renderTwig($path);
        echo $twig->render('index.twig');
    }
}