<?php

// Check if server is localhost
if ($_SERVER['SERVER_ADDR']) {
    $_SERVER['SERVER_ADDR'] = "localhost";
}

define("ROOT", "http://{$_SERVER['SERVER_ADDR']}:{$_SERVER['SERVER_PORT']}");

define("SITE", "ToDo");

define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "todo",
    "username" => "root",
    "passwd" => "usbw",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);

function url(string $uri = null): string
{
    if ($uri) {
        return ROOT . "/{$uri}";
    }

    return ROOT;
}