<?php
namespace Bank\Controllers;

use Bank\App;
use Bank\Json;

class BankController {

    private $settings = 'Json';
    // private $settings = 'Maria';

  private function get() {
    $db = 'Bank\\'.$this->settings;
    return $db::get();
  }

  public function home() {
    return App::view('home');
  }

  public function list() {
    $data = $this->get()->showAll();

    return App::view('first', ['data' => $data]);
  }

  public function new() {
    return App::view('new');
  }

  public function save() {
    // $nr = 'LT'.rand(100000000000000000, 999999999999999999);
    $new = ['Nr' => $_POST['nr'], 'vardas' => $_POST['name'], 'pavarde' => $_POST['surname'], 'ID' => $_POST['id'], 'likutis' => 0];
    $this->get()->create($new);
    App::redirect('');
  }

  public function convert() {
    return App::view('convert');
  }

  public function login() {
    return App::view('login');
  }

}