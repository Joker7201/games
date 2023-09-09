<?php

namespace core\mvc;
interface ControllerInterface
{
    public function setView(string $controller): void;

    public function render(string $name, array $context): void;
}