<?php
namespace Bank\Controllers;

use Bank\App;

class HomeController {

  public function home() {
    return App::view('home');
  }
}