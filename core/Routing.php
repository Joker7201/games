<?php

namespace core;

use core\mvc\ControllerInterface;
use RuntimeException;

class Routing
{
    private $controller = 'main';
    private $action = 'index';


    public function __construct() {
        $routeParts = explode('/', $_SERVER['REQUEST_URI']);
        if (isset($routeParts[1]) && !empty($routeParts[1])) {
            $this->setController($routeParts[1]);

        }

        if (isset($routeParts[2]) && !empty($routeParts[2])) {
            $this->setAction($routeParts[2]);
        }
    }

    /**
     * @return mixed|string
     */
    public function getController() {
        return $this->controller;
    }

    /**
     * @param mixed|string $controller
     */
    private function setController($controller): void {
        $this->controller = $controller;
    }

    /**
     * @return mixed|string
     */
    public function getAction() {
        return $this->action;
    }

    /**
     * @param mixed|string $action
     */
    private function setAction($action): void {
        $this->action = $action;
    }

    private function getControllerClass(): string {

        return '\\controller\\' . ucfirst($this->getController()) . 'Controller';
    }

    private function getActionMethod(): string {
        return lcfirst($this->getAction()) . 'Action';
    }

    public function handle(): void {
        try {
            $controllerClass = $this->getControllerClass();
            $actionMethod = $this->getActionMethod();
            if (!class_exists($controllerClass)) {
                throw new RuntimeException('Class '.$controllerClass.' not found.');
            }
            $controller = new $controllerClass;
            if (!$controller instanceof ControllerInterface || !method_exists($controller, $actionMethod)) {
                throw new RuntimeException('Method '.$actionMethod.' not found.');
            }
            $controller->setView($this->getController());
            $controller->$actionMethod();
        } catch (RuntimeException $exception) {
            http_response_code(500);
            echo 'Exception:' . $exception->getMessage();
        }
    }
}