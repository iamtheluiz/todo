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
        $todos = (new Todo())->find("st_todo = 0")->fetch(true);

        echo $this->view->render("home/index", [
            "title" => "Home | " . SITE,
            "todos" => $todos,
            "date" => $date
        ]);
    }

    public function done(): void
    {
        $date = (new \DateTime())->format('l, j F Y');
        $todos = (new Todo())->find("st_todo = 1")->fetch(true);

        echo $this->view->render("done/index", [
            "title" => "Done | " . SITE,
            "todos" => $todos,
            "date" => $date
        ]);
    }

    public function details($data)
    {
        $todo = (new Todo())->findById($data["id"]);

        if (!$todo) {
            $this->router->redirect("todo.home");
        }

        echo $this->view->render("details/index", [
            "title" => "Details | " . SITE,
            "todo" => $todo,
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

    public function update($data): void
    {
        $todo = (new Todo())->findById($data["id"]);

        $data["status"] == "0" ? $todo->st_todo = 1 : $todo->st_todo = 0;
        $todo->save();

        echo json_encode($data);
    }

    public function delete($data): void
    {
        $todo = (new Todo())->findById($data["id"])->destroy();

        echo json_encode($todo);
    }
}