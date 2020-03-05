<?php

require __DIR__ . "/../vendor/autoload.php";

use Source\Models\Todo;

$todo = new Todo();
$todo->nm_todo = "Novo Todo";
$todo->ds_todo = "Descrição do Todo";
$todo->st_todo = true;
$todo->save();

var_dump($todo);