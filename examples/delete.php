<?php

require __DIR__."/../vendor/autoload.php";

use Source\Models\Todo;

$todo = (new Todo())->findById(4);

if($todo) {
  $todo->destroy();
} else {
  var_dump($todo);
}
