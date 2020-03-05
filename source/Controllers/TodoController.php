<?php


namespace Source\Controllers;


use League\Plates\Engine;
use Source\Models\Todo;

/**
 * Class TodoController
 * @package Source\Controllers
 */
class TodoController
{
    /**
     * @var Engine
     */
    private Engine $view;

    /**
     * TodoController constructor.
     */
    public function __construct()
    {
        $this->view = Engine::create(__DIR__ . "/../Views", "php");
    }

    /**
     * @throws \Exception
     */
    public function home(): void
    {
        $date = (new \DateTime())->format('l, j F Y');
        $todos = (new Todo())->find()->fetch(true);

        echo $this->view->render("home/index", [
            "title" => "Home | " . SITE,
            "todos" => $todos,
            "date" => $date
        ]);
    }
}