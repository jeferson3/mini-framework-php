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
    'host'      => isset($settings["dbhost"]) ? $settings["dbhost"] : 'localhost',
    'database'  => isset($settings["dbname"]) ? $settings["dbname"] : 'teste',
    'username'  => isset($settings["dbuser"]) ? $settings["dbuser"] : 'root',
    'password'  => isset($settings["dbass"]) ? $settings["dbass"] : '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci'
]);

$capsule->bootEloquent();
