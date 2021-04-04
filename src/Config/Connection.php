<?php

namespace App\Config;
//use PDO;
//
//final class Connection
//{
//    /**
//     * @var PDO object
//     */
//    private static $instance = null;
//
//    private function __construct(){}
//    private function __clone(){}
//
//    /**
//     * @return PDO
//     */
//    public static function getInstance(): PDO
//    {
//        $banco = "teste";
//        $host = "localhost";
//        $user = "root";
//        $password = "";
//
//        if (!is_null(self::$instance)) {
//            return self::$instance;
//        }
//        $options = array(
//            PDO::ATTR_ERRMODE,
//            PDO::ERRMODE_EXCEPTION
//        );
//        return self::$instance = new PDO("mysql:dbname=$banco; host=$host", "$user", "$password", $options);
//    }
//}

use Illuminate\Database\Capsule\Manager as Capsule;

$settings = loadConfigs();

$capsule = new Capsule;

$capsule->addConnection([
    "driver" => isset($settings["driver"]) ? $settings["driver"] : "mysql",
    'host'      => isset($settings["host"]) ? $settings["host"] : 'localhost',
    'database'  => isset($settings["database"]) ? $settings["database"] : 'teste',
    'username'  => isset($settings["username"]) ? $settings["username"] : 'root',
    'password'  => isset($settings["password"]) ? $settings["password"] : '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci'
]);

$capsule->bootEloquent();