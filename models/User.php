<?php

namespace models;

class User
{
    public function indexAction(): void {
        $base = new ControllerBase();

        $path = 'main';
        $twig = $base->renderTwig($path);
        echo $twig->render('index.twig'); }
}