<?php

namespace App\Controllers;

final class HomeController extends Controller
{

    public function index() : void
    {
        self::load("welcome");
    }

    public function dashboard() : void
    {
        self::middleware("auth");
        self::load("home");
    }

}
