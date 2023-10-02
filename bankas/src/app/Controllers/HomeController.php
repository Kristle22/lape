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
    if (App::auth()) {
    return App::view('home', ['title' => 'HOME', 'user' => $_SESSION['user']->name, 'list' => $list]);
    }
    App::redirect('login');
  }

  public function indexJson() {
    $list = [];
    for($i = 0; $i < 10; $i++) {
      $list[] = rand(1000, 9999);
    }
    return App::json($list);
  }

  public function formJson() {
    $rawData = file_get_contents("php://input");
    $data = json_decode($rawData, 1);
    
    if (strlen($data['text']) < 5) {
      $err = 1;
      $msg = 'The text must contain more than 5 symbols';
    } else {
      $err = 0;
      $msg = 'Correct, your form was sent!';
    }

    return App::json(['err' => $err, 'msg' => $msg, 'text' => $data['text']]);
  }

  public function form() {
    return App::view('form', ['user' => $_SESSION['user']->name, 'messages' => M::get(), 'title' => 'FORMA']);
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