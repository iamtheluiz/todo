<?php

require __DIR__ . "/../vendor/autoload.php";

use Source\Models\Todo;

$todo = new Todo();
$list = $todo->find()->fetch(true);

foreach ($list as $item) {
    print_r($item->nm_todo);
}