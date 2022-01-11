<?php

namespace vendor\core\base;
use vendor\core\base\DB;

abstract class Model
{
    protected $pdo;
    protected $table;


    public function __construct()
    {
        $this->pdo = DB::getInstance();
    }

    public function query($sql)
    {
        return $this->pdo->execute($sql);
    }

    public function showAllData($table)
    {
        $sql = "SELECT * FROM $table";
        return  $this->pdo->query($sql);
    }


    public function insertUser($login,$email,$password,$name){
        $sql = "INSERT INTO users (login,email,password,name) VALUES ('$login', '$email','$password','$name')";
        return  $this->pdo->query($sql);
    }

    public function insertDataSql($arr,$db,$table)
    {
        $title = '';
        $data = '';

        foreach ($arr as $titleCol => $valueCol) {
          if ($titleCol !== 'type'){
              $title .= $titleCol . ",";
              $data .= "'" .  $valueCol ."',";
          }
        }
        $title = strval(substr( $title,0,-1)) ;
        $data = strval(substr($data,0,-1));

        $sql = "INSERT INTO $db.$table ($title) VALUES ($data)";
        return  $this->pdo->query($sql);
    }

    public function getUser($login,$pass) : array
    {
        $sql =  "SELECT login,email FROM $this->table WHERE login='$login' OR email='$pass'";
        return  $this->pdo->query($sql);
    }

    public function showTables() : array
    {
        $sql = "SHOW TABLES";
        $tables = $this->pdo->query($sql);
        foreach ($tables as $arr){
            foreach ($arr as $tableName){
                $arrNames[] = $tableName;
            }
        }

        return $arrNames;
    }

    public function showDatabases() : array
    {
        $sql = "SHOW DATABASES";
        $db = $this->pdo->query($sql);
        foreach ($db as $arr){
            foreach ($arr as $dbName){
                $arrNames[] = $dbName;
            }
        }

        return $arrNames;
    }

}