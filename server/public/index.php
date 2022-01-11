<?php

use vendor\core\Router;

//error_reporting(E_ALL);

//echo __FILE__ ;
const ERROR = '404.html';
define('CORE', dirname(__DIR__) . '/vendor/core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');
define('LAYOUT',  'default');


$query = rtrim($_SERVER['QUERY_STRING'], '/');
//var_dump($query);

//require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';

//require '../app/controllers/main.php';
//require '../app/controllers/UserController.php';
//require '../app/controllers/UserPage.php';

## auto-load
spl_autoload_register(function ($class) {
//    echo $class;
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
//    echo $file;
    if (is_file($file)) {
        require_once $file;
    }
});

//Router::add('posts/add',['controller' => 'Posts' , 'action' => 'add']);
//Router::add('posts',['controller' => 'Posts' , 'action' => 'index']);
//Router::add('',['controller' => 'Main' , 'action' => 'index']);

Router::add('^page/?(?P<action>[a-z-]+)?$', ['controller' => 'Main']);

#default routs
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);


