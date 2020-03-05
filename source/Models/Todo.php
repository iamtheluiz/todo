<?php


namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Class Todo
 * @package Source\Models
 */
class Todo extends DataLayer
{
    /**
     * Todo constructor.
     */
    public function __construct()
    {
        parent::__construct("todo", ["nm_todo", "ds_todo"], "cd_todo");
    }
}