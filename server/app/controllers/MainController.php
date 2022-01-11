<?php
namespace app\controllers;


use vendor\core\base\Controller;
use app\models\Main;


class MainController extends AppController
{

    public function indexAction()
    {
        $title = 'best-site.kh';

        $this->viewData(compact('title'));
    }

}