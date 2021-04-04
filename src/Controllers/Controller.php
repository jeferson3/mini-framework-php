<?php

namespace App\Controllers;

use App\traits\Middlewares;
use App\traits\Views;

abstract class Controller
{

    use Views;
    use Middlewares;

    /**
     * @return void
     */
    abstract public static function index();

    /**
     * @return void
     */
    abstract public static function create();

    /**
     * @return void
     */
    abstract public static function store();

    /**
     * @param int $id
     * @return void
     */
    abstract public static function show(int $id);

    /**
     * @param int $id
     * @return void
     */
    abstract public static function update(int $id);

    /**
     * @param int $id
     * @return void
     */
    abstract public static function delete(int $id);

}