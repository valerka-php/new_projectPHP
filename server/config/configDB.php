<?php
session_start();

if (isset($_SESSION['changeConfig'])){
    $host = $_COOKIE['host'];
    $db = $_COOKIE['db'];
    $user = $_COOKIE['user'];
    $password = $_COOKIE['pass'];

    return [
        'dsn' => "mysql:host={$host};dbname={$db};charset=utf8",
        'user' => "$user",
        'pass' => "$password"
    ];

}else{
    return [
        'dsn' => 'mysql:host=a_level_nix_mysql:3306;dbname=a_level_nix_mysql;charset=utf8',
        'user' => 'root',
        'pass' => 'cbece_gead-cebfa'
    ];
}


