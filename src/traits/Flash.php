<?php


namespace App\traits;


trait Flash
{

    public static function send($message="", $type="")
    {
        $_SESSION['flash'] = [
            "type" => $type,
            "message" => $message
        ];
    }

    /**
     * @return void
     */
    public static function load() : void
    {
        if (isset($_SESSION['flash']))
        {
            $message = $_SESSION['flash']['message'];
            $type = $_SESSION['flash']['type'];

            echo json_encode($_SESSION['flash']);

            unset($_SESSION['flash']);
        }
    }

}