<?php

use SimpleRouter\Router;

Router::get("/", "HomeController@index")->name('home');

Router::get("/auth/login", "AuthController@index")->name('login');

Router::post("/auth/login", "AuthController@login")->name('login.post');

Router::get("/auth/register", "AuthController@create")->name('register');

Router::post("/auth/register", "AuthController@register")->name('register.post');

Router::post("/auth/logout", "AuthController@logout")->name('logout');

Router::get("/admin/dashboard", "HomeController@dashboard")->name('dashboard');

Router::resource("admin/products", "ProductController")->name('products');

/*
Router::get("/admin/products", "ProductController@index")->name('products');

Router::get("/admin/products/create", "ProductController@create")->name('products.create');

Router::post("/admin/products/store", "ProductController@store")->name('products.store');

Router::get("/admin/products/{id}/show", "ProductController@show")->name('products.show');

Router::post("/admin/products/{id}/update", "ProductController@update")->name('products.update');

Router::post("/admin/products/{id}/delete", "ProductController@delete")->name('products.delete');
*/
Router::init();
