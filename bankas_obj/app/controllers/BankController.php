<?php
namespace Bank\Controllers;

use Bank\App;
use Bank\Json;
use Bank\Maria;

class BankController {

    // private static $db = 'Bank\\Json';
    private static $db = 'Bank\\Maria';

  private function getData() {
    return self::$db == 'Bank\\Maria' ? self::$db::getMaria() : self::$db::getJson();
  }

  public function __construct() {
    if (!App::isLogged()) {
      App::redirect('login');
    }
  }

  public function list() {
    $data = $this->getData()->showAll();
    usort($data, function($a, $b) {
      return $a['pavarde'] <=> $b['pavarde'];
    });
    return App::view('first', ['data' => $data]);
  }

  public function newAcc() {
    return App::view('new');
  }

  public function addPage($id) {
    $account = $this->getData()->show($id);
    return App::view('add', ['acc' => $account]);
  }

  public function chargePage($id) {
    $extra = 'LT'.rand(100000000000000000, 999999999999999999);
    $account = $this->getData()->show($id);
    return App::view('charge', ['acc' => $account], $extra);
  }

  public function save() {
    // $nr = 'LT'.rand(100000000000000000, 999999999999999999);
    $new = ['Nr' => $_POST['nr'], 'vardas' => $_POST['name'], 'pavarde' => $_POST['surname'], 'AK' => $_POST['id'], 'likutis' => 0];

    $lenName = strlen($_POST['name']); 
    $lenSurname = strlen($_POST['surname']);
    $lenId = strlen($_POST['id']); 

    if (!preg_match ("/^[0-9]*$/", $_POST ['id'])) { 
      App::addError('id_nums', 'Your Personal Code is not valid.');
      App::redirect('new');
    } 
    if ($lenId && $lenId != 11) {
      App::addError('id_len', 'Your Personal Code\'s length is invalid.');
      App::redirect('new');
    }
    if(empty($_POST['id'])) {
      App::addError('no_id', 'Personal code is required.');
      App::redirect('new');
    }
    if(empty($_POST['name'])) {
      App::addError('no_name', 'Name is required.');
      App::redirect('new');
    } 
    if(empty($_POST['surname'])) {
      App::addError('no_surname', 'Surname is required.');
      App::redirect('new');
    } 
    if($lenName < 3) {
      App::addError('name_len', 'Name must consist at least of 3 letters.');
      App::redirect('new');
    } 
    if($lenSurname < 3) {
      App::addError('surname_len', 'Surname must consist at least of 3 letters.');
      App::redirect('new');
    } 
    if ($this->checkId($_POST['id']) == 'NOT') {
      App::addError('id_unique', 'Sąskaita su tokiu asmens kodu jau atidaryta.');
      App::redirect('new');
    } 
    $this->getData()->create($new);
    App::addMessage('success', 'Nauja sąskaita sėkmingai sukurta.'); 
    App::redirect('list');
  }

  public function update($action, $id) {
    $account = $this->getData()->show($id);
    if ('add' == $action) {
      $account['likutis'] += (int)$_POST['plus'];
      App::addMessage('success', 'Jusu saskaita sekmingai papildyta.'); 
    }
    if ('charge' == $action) {
      if (empty($_POST['name']) || empty($_POST['surname'])) {
        App::addMessage('danger', 'Įveskite gavėjo vardą ir pavardę.');
        App::redirect("charge/$id");
      }
      elseif (empty($_POST['minus'])) {
        App::addMessage('danger', 'Įveskite reikiamą sumą.');
        App::redirect("charge/$id");
      }
      elseif ($_POST['minus'] > $account['likutis']) {
        App::addMessage('warning', 'Jusu saskaitoje nepakankamas pinigų likutis.');
        App::redirect("charge/$id");
      }
      $account['likutis'] -= (int)$_POST['minus'];
      App::addMessage('success', 'Is Jusu saskaitos pinigai sekmingai nuskaiciuoti.');
      $this->setTransfer();
    }
      $this->getData()->update($id, $account);
      App::redirect('list');
  }

  public function setTransfer() : void {
    $id = rand(32000000000, 60999999999);
    $new = ['Nr' => $_POST['nr'], 'vardas' => $_POST['name'], 'pavarde' => $_POST['surname'], 'AK' => $id, 'likutis' => $_POST['minus']];
    $this->getData()->create($new);
  }

  public function delete($id) {
    $account = $this->getData()->show($id);
    if ($account['likutis'] > 0) {
      App::addMessage('warning', 'Jūsų sąskaitos ištrinti negalima, kadangi joje yra lėšų.');
      App::redirect('list');
    }
    $this->getData()->delete($id);
    App::addMessage('success', 'Jusu saskaita sekmingai istrinta.');
    App::redirect('list');
  }

  public function checkId(int $id) {
    $data = $this->getData()->showAll();
    foreach ($data as &$acc) {
      if($id == $acc['AK']) {
        $msg = 'NOT';
        break;
      } else $msg = 'OK';
    }
    return $msg;
  }
}