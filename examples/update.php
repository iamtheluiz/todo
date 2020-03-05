<?php

require __DIR__ . "/../vendor/autoload.php";

use Source\Models\Todo;

$todo = (new Todo())->findById(3);
$todo->nm_todo = "Tarefa Importante";
$todo->save();

var_dump($todo);
