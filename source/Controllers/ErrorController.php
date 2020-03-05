<?php


namespace Source\Controllers;


use League\Plates\Engine;

/**
 * Class ErrorController
 * @package Source\Controllers
 */
class ErrorController
{
    /**
     * @var Engine
     */
    private Engine $view;

    /**
     * ErrorController constructor.
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->view = Engine::create(__DIR__ . "/../Views", "php");
        $this->view->addData(["router" => $router]);
    }

    /**
     * @param array $data
     */
    public function home(array $data): void
    {
        echo $this->view->render("error/index", [
            "title" => "Error | " . SITE,
            "error" => $data["errcode"]
        ]);
    }
}