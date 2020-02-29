<?php


namespace Source\Controllers;


class Error
{
  public function home($data)
  {
    echo "<h1>Error {$data["errcode"]}!</h1>";
    var_dump($data);
  }
}