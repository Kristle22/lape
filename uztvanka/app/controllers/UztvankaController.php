<?php
namespace Bebru\Uztvanka\Controllers;

use Bebru\Uztvanka\App;
use Bebru\Uztvanka\Json;

class UztvankaController {

    private $settings = 'Json';
    // private $settings = 'Maria';

  private function get() {
    $db = 'Bebru\\Uztvanka\\'.$this->settings;
    return $db::get();
  }

  public function __construct() {
    if (!App::isLogged()) {
      App::redirect('login');
    }
  }

  public function index() {
    $bebrai = $this->get()->showAll();
    // $db_obj = $this->get();
    // $bebrai = $db_obj->showAll();

    return App::view('pirmas', ['bebrai' => $bebrai]); // or view('pirmas, $bebrai);
  }

  public function create() {
    return App::view('naujas');
  }
  public function save() {
    $nr = rand(1000000000000, 9999999999); // netikras unikalus skaicius
    $nauja = ['juodieji' => 0, 'rudieji' => 0, 'id' => $nr];
    $this->get()->create($nauja);
    App::addMessage('success', 'Uztvanka sekmingai sukurta.');
    App::redirect('list');
  }

    // ['add-black', 'rem-black', 'add-brown', 'rem-brown'];
  public function update($action, $id) {
    $uztvanka = $this->get()->show($id);
    if ('add-black' == $action) {
      $uztvanka['juodieji'] += (int)$_POST['count'];
      App::addMessage('success', 'Sekmingai pridejote juodus bebrus.');
      
    }
    if ('rem-black' == $action) {
      $uztvanka['juodieji'] -= (int)$_POST['count'];
      App::addMessage('success', 'Sekmingai atemete juodus bebrus.');
    }
    if ('add-brown' == $action) {
      $uztvanka['rudieji'] += (int)$_POST['count'];
      App::addMessage('success', 'Sekmingai pridejote rudus bebrus.');
    }
    if ('rem-brown' == $action) {
      $uztvanka['rudieji'] -= (int)$_POST['count'];
      App::addMessage('success', 'Sekmingai atemete rudus bebrus.');
    }
    $this->get()->update($id, $uztvanka);
    App::redirect('list');
  }

  public function delete($id) {
    $this->get()->delete($id);
    App::addMessage('success', 'Uztvanka sekmingai sugriauta.');
    App::redirect('list');
  }

}