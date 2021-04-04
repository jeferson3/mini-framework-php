<?php

namespace App\Controllers;

final class HomeController extends Controller
{

    public static function index() : void
    {
        self::load("welcome");
    }

    public static function dashboard() : void
    {
        self::middleware("auth");
        self::load("home");
    }

    public static function create()
    {
        self::redirect('home');
    }

    public static function store()
    {
        self::redirect('home');
    }

    public static function show(int $id)
    {
        self::redirect('home');
    }

    public static function update(int $id)
    {
        self::redirect('home');
    }

    public static function delete(int $id) : void
    {
        dd($id);
//        self::redirect('home');
    }
}
