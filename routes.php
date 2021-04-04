<?php

//$routes = array(
//    "/" => [
//        "index"=>"HomeController@index",
//    ],
//    "dashboard" => [
//        "index"=>"HomeController@dashboard"
//    ],
//    "users" => [
//        "index"=>"UserController@index",
//        "create"=>"UserController@create",
//        "store"=>"UserController@store",
//        "delete"=>"UserController@delete",
//    ],
//    "login" => [
//        "index" => "AuthController@index",
//    ],
//    "register" => [
//        "index" => "AuthController@create",
//    ],
//    "auth" => [
//        "logout" => "AuthController@logout",
//        "loginPost" => "AuthController@login",
//        "registerPost" => "AuthController@register"
//    ]
//);
//$page = isset($_GET['p']) ? $_GET['p'] : '/';
//$method = isset($_GET['action']) ? $_GET['action'] : null;
//
//if (array_key_exists($page, $routes))
//{
//    $aux = array();
//
//    if (!is_null($method) and !is_null(array_key_exists($method, $routes[$page])))
//        $aux = explode("@", $routes[$page][$method]);
//    else
//        $aux =  explode("@", $routes[$page][array_key_first($routes[$page])]);
//
////    dd($aux);
//    $controller = $aux[0];
//    $method = $aux[1];
//
//    $class = "\App\Controllers\\".$controller;
//    $class::$method();
//
//} else {
//    \App\traits\Views::load('not_found');
//}

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\UserController;

use App\Routes\Router as Route;

Route::add("/", function (){
    HomeController::index();
}, 'get');

Route::add("/auth/login", function (){
    AuthController::index();
});

Route::add("/auth/login", function (){
    AuthController::login();
}, 'post');

Route::add("/auth/register", function (){
    AuthController::create();
});

Route::add("/auth/register", function (){
    AuthController::register();
}, 'post');

Route::add("/auth/logout", function (){
    AuthController::logout();
}, 'post');

Route::add("/admin/dashboard", function (){
    HomeController::dashboard();
});

Route::add("/admin/products", function (){
    ProductController::index();
});

Route::add("/admin/products/create", function (){
    ProductController::create();
});

Route::add("/admin/products/store", function (){
    ProductController::store();
}, 'post');

Route::add("/admin/products/([0-9]*)/show", function ($id){
    if (isset($id))
    {
        ProductController::show($id);
        exit();
    }
    else
    {
        header("location: $url");
        exit();
    }
});

Route::add("/admin/products/([0-9]*)/update", function ($id){
    if (isset($id))
    {
        ProductController::update($id);
        exit();
    }
    else
    {
        header("location: $url");
        exit();
    }
}, 'post');

Route::add("/admin/products/([0-9]*)/delete", function ($id){
    if (isset($id))
    {
        ProductController::delete($id);
        exit();
    }
    else
    {
        header("location: $url");
        exit();
    }
}, 'post');

Route::pathNotFound(function (){
    echo "not found";
});

Route::run("/");