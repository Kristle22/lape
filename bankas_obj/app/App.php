<?php
namespace Bank;

use Bank\Controllers\BankController;
use Bank\Controllers\HomeController;
use Bank\Controllers\LoginController;
use Bank\Controllers\RatesController;

class App {

  public static function start() {
    self::router();   
  }

  public static function router() {
    
    if ('GET' == $_SERVER['REQUEST_METHOD'] && 1 == count(ROUTE) && '' === ROUTE[0]) {
      return (new HomeController)->home();
    }
    if ('GET' == $_SERVER['REQUEST_METHOD'] && 1 == count(ROUTE) && 'list' === ROUTE[0]) {
      return (new BankController)->list();
    }
    if ('GET' == $_SERVER['REQUEST_METHOD'] && 1 == count(ROUTE) && 'new' === ROUTE[0]) {
      return (new BankController)->newAcc();
    }
    if ('POST' == $_SERVER['REQUEST_METHOD'] && 1 == count(ROUTE) && 'new' === ROUTE[0]) {
      return (new BankController)->save();
    }
    if ('GET' == $_SERVER['REQUEST_METHOD'] && 2 == count(ROUTE) && 'add' === ROUTE[0]) {
      return (new BankController)->addPage(ROUTE[1]);
    }
    if ('GET' == $_SERVER['REQUEST_METHOD'] && 2 == count(ROUTE) && 'charge' === ROUTE[0]) {
      return (new BankController)->chargePage(ROUTE[1], $nr);
    }
    if ('POST' == $_SERVER['REQUEST_METHOD'] && 2 == count(ROUTE) && 'delete' == ROUTE[0]) {
      return (new BankController)->delete(ROUTE[1]);
    }
    if ('POST' == $_SERVER['REQUEST_METHOD'] && 2 == count(ROUTE) && in_array(ROUTE[0], ['add', 'charge'])) {
      return (new BankController)->update(ROUTE[0], ROUTE[1]);
    }
    if ('GET' == $_SERVER['REQUEST_METHOD'] && 1 == count(ROUTE) && 'login' === ROUTE[0]) {
      return (new LoginController)->showLogin();
    }
    if ('POST' == $_SERVER['REQUEST_METHOD'] && 1 == count(ROUTE) && 'login' === ROUTE[0]) {
      return (new LoginController)->login();
    }
    if ('POST' == $_SERVER['REQUEST_METHOD'] && 1 == count(ROUTE) && 'logout' === ROUTE[0]) {
      return (new LoginController)->logout();
    }
    if ('GET' == $_SERVER['REQUEST_METHOD'] && 1 == count(ROUTE) && 'convert' === ROUTE[0]) {
      return (new RatesController)->convert();
    }
    if ('POST' == $_SERVER['REQUEST_METHOD'] && 1 == count(ROUTE) && 'convert' === ROUTE[0]) {
      return (new RatesController)->request($_POST['from'], $_POST['to'], $_POST['amount']);
    }
  }

  public static function view($name, $data = [], $extra = '') {
    extract($data);
    require DIR."view/$name.php";
  }

  public static function redirect($url) {
    header('Location: '.URL.$url);
    die;
  }

  public static function isLogged() {
    return isset($_SESSION['login']) && $_SESSION['login'] == 1;
  }

  // MESSAGES
  public static function addMessage(string $type, string $msg) : void {
    $_SESSION['msg'][] = ['type' => $type, 'msg' => $msg];
  }
  
  public static function clearMessages() : void {
    $_SESSION['msg'] = [];
  }
  
  public static function showMessages() : void {
    $messages = $_SESSION['msg'];
    self::clearMessages();
    self::view('msg', ['messages' => $messages]);
  }

// VALIDATION
  public static function addError(string $type, string $err) : void {
  $_SESSION['errors'][] = ['type' => $type, 'err' => $err];
  }
}