<?php

namespace vendor\core\base;

class View
{
    public $route = [];
    public $view;
    public $layout;


    public function __construct($route, $layout = '', $view = '')
    {
        $this->route = $route;

        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }

        $this->view = $view;


//        echo "путь" . var_dump($route) . '<br>';
//        echo "шаблон" . var_dump($layout) . '<br>';
//        echo "вид" . var_dump($view) . '<br>';

    }

    public function render($vars)
    {
//        debug($vars);
        if (is_array($vars)){
            extract($vars);
        }

        $file_view = APP . "/views/{$this->route['controller']}/{$this->view}.php";

        ob_start();

        if (is_file($file_view)) {
            require_once $file_view;
        } else {
            echo "вид не найден {$file_view}";
        }

        $content = ob_get_clean();
//        echo $content;

        if (false !== $this->layout){
            $file_layout = APP . "/views/layouts/{$this->layout}.php";
            if (is_file($file_layout)) {
                require_once $file_layout;
            } else {
                echo "шаблон не найден {$file_layout}";
            }
        }

    }

}