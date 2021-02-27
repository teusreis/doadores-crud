<?php

use App\Database\Db;
use CoffeeCode\Router\Router;

require  __DIR__ . "./../vendor/autoload.php";

$router = new Router(DOMAIN, "@");

$router->namespace("App\Controllers");

$router->group("");
$router->get("/", "DoadorController@index");
$router->get("/{id}", "DoadorController@show");
$router->get("/create", "DoadorController@create");
$router->post("/create", "DoadorController@create");
$router->get("/edit/{id}", "DoadorController@edit");
$router->post("/edit/{id}", "DoadorController@edit");
$router->delete("/{id}", "DoadorController@delete");

$router->get("/emailexist/{email}/{id}", "DoadorController@emailExist");
$router->get("/cpfexist/{cpf}/{id}", "DoadorController@cpfExist");


/**
 * This method executes the routes
 */
$router->dispatch();

if ($router->error()) {
    var_dump($router->error());
}