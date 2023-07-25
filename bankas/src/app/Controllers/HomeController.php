<?php
namespace Bankas\Controllers;

use Bankas\App;

class HomeController {
  public function index() {
    return App::view('home', ['Kristina']);
  }
}