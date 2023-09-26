<?php

namespace core\mvc;

require_once 'vendor/autoload.php';
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class ControllerBase implements ControllerInterface {



    /**
     * @var FilesystemLoader
     */
    protected $loader;
    /**
     * @var Environment
     */
    protected $view;

    /**
     * @param string $controller
     * @return void
     */
    public function setView(string $controller): void {
        $this->loader = new FilesystemLoader(array(VIEW . '/' . $controller));
        $this->view = new Environment($this->loader, [
            'cache'=>false
        ]);
    }

    /**
     * @param string $name
     * @param array $context
     * @return void
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function render(string $name, array $context = []): void {
        echo $this->view->render($name, $context);
    }


    /**
     * index => Alle anzeigen
     * show => 1 anzeigen
     * create => Formular für neu
     * (store => neu abspeichern)
     * edit => Vorhandenes bearbeiten
     * (update => aktuallisiertes vorhandenes abspeichern)
     * delete => Löscht 1 bestimmtes
     **/
}