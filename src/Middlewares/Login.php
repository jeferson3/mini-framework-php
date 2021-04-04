<?php

namespace App\Middlewares;

final class Login
{
    public static function check()
    {
        if (auth())
        {
            header("location: $url/admin/dashboard");
            exit();
        }
    }
}