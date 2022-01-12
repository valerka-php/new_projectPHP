<?php

namespace vendor\core;

class Router
{
    protected static $routesAll = [];
    protected static $routeCurrent = [];

    public static function add($regExp, $routeCurrent = [])
    {
        self::$routesAll[$regExp] = $routeCurrent;
    }



    private static function findRoute($queryString): bool
    {
        foreach (self::$routesAll as $pattern => $route) {
//preg_match — Выполняет проверку на соответствие регулярному выражению
            if (preg_match("#$pattern#i", $queryString, $matches)) {
//                debug($matches);
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $route[$key] = $value;
                    }
                }
                if (!isset($route['action'])) {
                    $route['action'] = 'index';
                }
                $route['controller'] = ucwords($route['controller']);
                self::$routeCurrent = $route;
//                debug($route);
                return true;
            }
        }
        return false;
    }


    public static function dispatch($queryString)
    {
        if (self::findRoute($queryString)) {
            $controller = 'app\controllers\\' . ucwords(self::$routeCurrent['controller']) . 'Controller';
//            debug($controller);
//            debug(self::$routeCurrent);
            if (class_exists($controller)) {
                $controllerObj = new $controller(self::$routeCurrent);
                $action = self::$routeCurrent['action'] . 'Action';
//                debug($action);
                if (method_exists($controllerObj, $action)) {
                    $controllerObj->$action();
                    $controllerObj->getView();
                } else {
                    require_once ERROR;
                }
            } else {
                require_once ERROR;
            }
        } else {
            require_once ERROR;
        }
    }


}