<?php

namespace App\Middlewares;

final class Auth
{
    public static function check()
    {
        if (!auth())
        {
            header("location: $url/auth/login");
            exit();
        }
    }

}