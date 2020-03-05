<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(ROOT);

// Controllers
$router->namespace("Source\Controllers");

// Index
$router->group(null);
$router->get("/", "TodoController:home");

// To do
$router->group("todo");

// New Task
$router->group("new");
$router->get("/", "TodoController:new");
$router->post("/", "TodoController:store");

// Errors
$router->group("ooops");
$router->get("/{errcode}", "ErrorController:home");

// Process
$router->dispatch();

if ($router->error()) {
    $router->redirect("/ooops/{$router->error()}");
}