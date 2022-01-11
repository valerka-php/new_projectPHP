<?php

namespace app\controllers;

use app\models\Registration;


class
RegistrationController extends AppController
{

    public function indexAction()
    {
        $title = 'registration';
        $this->viewData(compact('title'));

        session_start();
        if (!empty($_POST)) {
            if ($_POST['password'] === $_POST['confirmPassword']) {
                $hiddenPass = md5($_POST['password']);

                $model = new Registration;
                $check = $model->getUser($_POST['login'], $_POST['email']);
//            print_r($check);
                if (!empty($check)) {
                    foreach ($check as $arr) {
                        foreach ($arr as $value) {
                            if ($value === $_POST['login']) {
                                $this->setMessange('login is taken');
                                break (2);
                            } elseif ($value === $_POST['email']) {
                                $this->setMessange('email is taken');
                                break (2);
                            }
                        }
                    }
                } else {
                    $model->insertUser($_POST['login'], $_POST['email'], $hiddenPass, $_POST['name']);
                    $this->setMessange('succesfull');
                    header('location: /login');
                }
            } else {
                $this->setMessange('Password is not correct');
            }

            $this->showMessange();
//            var_dump($_SESSION);
//            unset($_SESSION['msg']);
//            var_dump($_SESSION);

        }

    }


}