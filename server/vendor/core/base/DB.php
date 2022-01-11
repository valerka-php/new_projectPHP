<?php

namespace vendor\core\base;

class DB
{
    protected $pdo;
    protected static $instance;

    protected function __construct()
    {
        $db = require_once ROOT . '/config/configDB.php';
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];

        $this->pdo = new \PDO($db['dsn'] , $db['user'], $db['pass'], $options);

    }

    public static function getInstance(): object
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function execute($requestSql): bool
    {
        $prepare = $this->pdo->prepare($requestSql);
        return $prepare->execute();
    }

    public function query($requestSql): array
    {
        $prepare = $this->pdo->prepare($requestSql);
        $result = $prepare->execute();
        if ($result !== false) {
            return $prepare->fetchAll();
        }
        return [];
    }
}