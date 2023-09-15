<?php
namespace Bankas\Controllers;

use Bankas\App;
use Bankas\Messages as M;

class HomeController {
  public function index() {
    $list = [];
    for($i = 0; $i < 10; $i++) {
      $list[] = rand(1000, 9999);
    }
    return App::view('home', ['title' => 'HOME', 'user' => $_SESSION['user']->name, 'list' => $list]);
  }

  public function indexJson() {
    $list = [];
    for($i = 0; $i < 10; $i++) {
      $list[] = rand(1000, 9999);
    }
    return App::json(['title' => 'HOME', 'user' => $_SESSION['user']->name, 'list' => $list]);
  }

  public function form() {
    return App::view('form', ['user' => $_SESSION['user']->name, 'messages' => M::get()]);
  }

  public function getIt($a) {
    echo'PARAM: '. $a;
  }

  public function doForm() {
    if(($_POST['csrf'] ?? '') != App::csrf()) {
      M::add('Blogas kodas', 'alert');
      return App::redirect('forma');
    }
    M::add('Puiku!', 'success');
    M::add($_POST['form'], 'alert');
    return App::redirect('forma');
  }
}