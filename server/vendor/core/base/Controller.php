<?php

namespace vendor\core\base;

abstract class Controller
{
    public $route = [];
    public $view;
    public $layout;
    public $vars = [];

    public function __construct($routeCurrent)
    {
        $this->route = $routeCurrent;
        $this->view = $routeCurrent['action'];
    }

    public function getView()
    {
        $viewObj = new View($this->route, $this->layout, $this->view);
        $viewObj->render($this->vars);
    }

    public function viewData($vars)
    {
        $this->vars = $vars;
    }

}