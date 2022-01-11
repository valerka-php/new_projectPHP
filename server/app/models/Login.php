<?php

namespace app\models;



class Login extends \vendor\core\base\Model
{
    public $table = 'users';

    public function checkUser($login,$pass) : array
    {
        $sql =  "SELECT login,password FROM $this->table WHERE login='$login' AND password='$pass'";
        return  $this->pdo->query($sql);
    }

    public function getUserName($login, $password): array
    {
        $sql = "SELECT name FROM users WHERE login='$login' AND password='$password'";
        return $this->pdo->query($sql);

    }
}