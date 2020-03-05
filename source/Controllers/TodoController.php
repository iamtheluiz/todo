<?php


namespace Source\Controllers;


use CoffeeCode\Router\Router;
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
     * @var Router
     */
    private Router $router;

    /**
     * TodoController constructor.
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
        $this->view = Engine::create(__DIR__ . "/../Views", "php");
        $this->view->addData(["router" => $router]);
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

    public function new(): void
    {
        echo $this->view->render("new/index", [
            "title" => "New | " . SITE
        ]);
    }

    public function store($data): void
    {
        $todo = new Todo();
        $todo->nm_todo = $data["nm_todo"];
        if ($data["ds_todo"]) {
            $todo->ds_todo = $data["ds_todo"];
        }

        $todo->save();

        $this->router->redirect("");
    }
}