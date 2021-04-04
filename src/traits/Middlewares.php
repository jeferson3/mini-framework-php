<?php

namespace App\traits;

trait Middlewares
{
    /**
     * function check middleware
     *
     * @param string $name
     * @return void
     */
    public static function middleware(string $name) : void
    {
        if(isset($name) and !empty($name))
        {
            $url = $_SERVER["DOCUMENT_ROOT"];

            $middleware = ucfirst(strtolower($name));

            $path = $url."/src/middlewares/".$middleware.".php";

            if (file_exists($path))
            {
                $middleware = "\App\Middlewares\\".$middleware;
                $middleware::check();
            }
        }
    }
}