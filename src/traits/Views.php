<?php

namespace App\traits;

trait Views
{
    /**
     * function load view
     *
     * @param string $view
     * @param array $args
     * @return void
     */
    public static function load(string $view, array $args=[]) : void
    {
        $aux = explode(".", $view);
        $dir = join("/", $aux);

        $root = $_SERVER["DOCUMENT_ROOT"];
        $file = $root."/src/resources/views/$dir.php";

        if (file_exists($file)){
            if (isset($args)) extract($args);

            require_once($root."/functions.php");
            require($root."/start.php");
            require($root."/src/resources/views/$dir.php");
            exit();
        }

        $file = end($aux);
        die("<p>Error file not found: <strong style='color: red'>$file.php</strong><br> $dir</p>");
    }

    /**
     * function redirect route
     *
     * @param string $name
     * @param bool $withData
     * @return void
     */
    public static function redirect(string $name, $withData = false)
    {
        if ($withData)
        {
            if (isset($_POST['_method'])) unset($_POST['_method']);
            if (isset($_POST['password'])) unset($_POST['password']);
            $_SESSION['old_value'] = $_POST;
        }

        if ($name == '/' or $name == 'home') {
            header('location: /');
            exit();
        }

        if ($name == 'back') {
            $back = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
            header("location: $back");
            exit();
        }

        $name = join("/", explode(".", $name));

        header("location: /$name");
        exit();
    }

}