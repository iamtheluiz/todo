<?php

require __DIR__."/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

// Controllers
$router->namespace("Source\Controllers");

// Index
$router->group(null);
$router->get("/", function (){
  echo "<h1>Index</h1>";
});

// Errors
$router->group("ooops");
$router->get("/{errcode}", "Error:home");

$router->dispatch();

if($router->error()) {
  $router->redirect("/ooops/{$router->error()}");
}