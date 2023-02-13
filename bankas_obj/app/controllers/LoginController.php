<?php
namespace Bank\Controllers;

use Bank\App;
use Bank\Login\Json;

class LoginController {

  private $settings = 'Json';
  // private $settings = 'Maria';

  private function get() {
    $db = 'Bank\\Login\\'.$this->settings;
    return $db::get();
  }

  public function showlogin() {
    return App::view('login');
  }

  public function login() {
    $email = $_POST['email'] ?? '';
    $pass = md5($_POST['pass']) ?? '';
    $user = $this->get()->show($email);
    
    if (empty($user)) {
      App::addMessage('danger', 'Ivedete neteisingus duomenis.');
      App::redirect('login');
    }
    if ($user['pass'] == $pass) {
      $_SESSION['login'] = 1;
      $_SESSION['name'] = $user['name'];
      App::addMessage('success', 'Sėkmingai prisijungete.');
      App::redirect('list');
    }
    App::addMessage('danger', 'Ivedete neteisingus duomenis.');
    App::redirect('login');
  }

  public function logout() {
    unset($_SESSION['login'], $_SESSION['name']);
    App::addMessage('success', 'Sekmingai atsijungete!');
    App::redirect('login');
  }
}