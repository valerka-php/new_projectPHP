<?php

namespace app\controllers;

use app\models\Profile;

class ProfileController extends AppController
{

    public function indexAction()
    {
        $title = 'profile';
        session_start();
//        print_r($_POST);

        if (isset ($_COOKIE['host'])){
            $_SESSION['changeConfig'] = 'true';
        }

        $this->layout = 'profile';

        $model = new Profile;
        $tables = $model->showTables();
        $bases = $model->showDatabases();

//        var_dump($_SESSION['table']);

        if (!$_POST['sql']) {
            foreach ($_POST as $type => $fileName) {
                $_SESSION["$type"] = $model->showDataFile("$type", "$fileName");
            }
        }else{
            $_SESSION['sql'] = $model->showAllData($_POST['sql']);
        }

        $this->viewData(compact('tables', 'bases','title'));
    }

    public function settingsAction()
    {
        $title = 'settings';
        $this->viewData(compact('title'));

        if (isset($_POST['click'])) {
            setcookie("txt", $_POST['pathTxt'], time() + 3600 * 12);
            setcookie("csv", $_POST['pathCsv'], time() + 3600 * 12);
            setcookie("host", $_POST['host'], time() + 3600 * 12);
            setcookie("user", $_POST['user'], time() + 3600 * 12);
            setcookie("db", $_POST['db'], time() + 3600 * 12);
            setcookie("pass", $_POST['pass'], time() + 3600 * 12);
        }

//        print_r($_POST);
    }

    public function formDataAction()
    {
        $title = 'add info';
        $this->viewData(compact('title'));

        $model = new Profile;
        if (isset($_POST['type'])){
            if ($_POST['type'] !== 'sql'){
//                print_r($_POST['type']);
                $model->addDataFile($_POST);
                $_SESSION['msg'] = ' your data has been saved :)';
            }else{
                $model->insertDataSql($_POST,$_COOKIE['db'], $_SESSION['currentSqlTable']);
                $_SESSION['msg'] = ' your data has been saved :)';
            }

        }

    }

}