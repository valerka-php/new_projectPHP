<?php

namespace app\controllers;

use app\models\Login;

class LoginController extends AppController
{

    public function indexAction()
    {
        $title = 'login';
        $this->viewData(compact('title'));

        session_start();
        if ($_SESSION['user'] === true) {
            header('location: /profile');
        } elseif (isset($_POST['click'])) {

            $model = new Login;
            $check = $model->checkUser($_POST['login'], md5($_POST['password']));

            if (!empty($check)) {
//                var_dump($check);
                $userName = $model->getUserName($_POST['login'], md5($_POST['password']));
                $_SESSION['userName'] = $userName[0]['name'];
                $_SESSION['user'] = true;
                header('location: /profile');
            } else {
                $this->setMessange('Неверный логин или пароль');
            }

//            print_r($_POST);
        }


        $this->showMessange();
        unset($_SESSION['msg']);
    }


}