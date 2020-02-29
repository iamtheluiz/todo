<?php


namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Todo extends  DataLayer
{
  public function __construct()
  {
    parent::__construct("todo", ["nm_todo", "ds_todo", "st_todo"], "cd_todo");
  }
}