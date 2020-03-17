<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(ROOT);

// Controllers
$router->namespace("Source\Controllers");

// Index
$router->group(null);
$router->get("/", "TodoController:home", "todo.home");
$router->get("/done", "TodoController:done", "todo.done");

// To do
$router->group("todo");
$router->put("/update", "TodoController:update", "todo.update");
$router->post("/store", "TodoController:store", "todo.store");
$router->delete("/delete", "TodoController:delete", "todo.delete");
$router->get("/{id}", "TodoController:details", "todo.details");

// New Task
$router->group("new");
$router->get("/", "TodoController:new", "todo.new");

// Errors
$router->group("ooops");
$router->get("/{errcode}", "ErrorController:home", "error.home");

// Process
$router->dispatch();

if ($router->error()) {
    $router->redirect("/ooops/{$router->error()}");
}