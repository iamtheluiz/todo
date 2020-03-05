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
     */
    public function __construct()
    {
        $this->view = Engine::create(__DIR__ . "/../Views", "php");
    }

    /**
     * @param array $data
     */
    public function home(array $data): void
    {
        echo $this->view->render("error", [
            "title" => "Error | " . SITE,
            "error" => $data["errcode"]
        ]);
    }
}