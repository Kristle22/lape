<?php
namespace Bank\Controllers;

require DIR.'/data/seeder.php';

use Bank\App;
use Bank\Login\Json;
use Bank\Login\Maria;

class LoginController {

  // private static $db = 'Bank\\Login\\Json';
  private static $db = 'Bank\\Login\\Maria';

  public static function getData() {
    return self::$db == 'Bank\\Login\\Maria' ? self::$db::getMaria() : self::$db::getJson();
  }

  public function showlogin() {
    return App::view('login');
  }

  public function login() {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    $user = self::getData()->getUser($email, $pass);
    if (empty($user)) {
      App::addMessage('danger', 'Ivedete neteisingus duomenis.');
      App::redirect('login');
    }
    $_SESSION['login'] = 1;
    $_SESSION['name'] = $name;
    App::addMessage('success', 'Sėkmingai prisijungete.');
    App::redirect('list');
  }

  public function logout() {
    unset($_SESSION['login'], $_SESSION['name']);
    App::addMessage('success', 'Sekmingai atsijungete!');
    App::redirect('login');
  }
}