<?php

namespace app\controllers;

use vendor\core\base\Controller;

class AppController extends Controller
{

    public function showMessange()
    {
        $messange = $_SESSION['msg'];
        $this->viewData(compact('messange'));
    }

    public function setMessange($txt)
    {
        $_SESSION['msg'] = $txt;
    }

}