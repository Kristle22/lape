<?php
namespace Bank;

use Bank\Controllers\BankController;

class App {

  public static function start() {
    self::router();   
  }

  public static function router() {
    
    if ('GET' == $_SERVER['REQUEST_METHOD'] && 1 == count(ROUTE) && '' === ROUTE[0]) {
      return (new bankController)->home();
    }
    if ('GET' == $_SERVER['REQUEST_METHOD'] && 1 == count(ROUTE) && 'list' === ROUTE[0]) {
      return (new bankController)->list();
    }
    if ('GET' == $_SERVER['REQUEST_METHOD'] && 1 == count(ROUTE) && 'new' === ROUTE[0]) {
      return (new bankController)->new();
    }
    if ('POST' == $_SERVER['REQUEST_METHOD'] && 1 == count(ROUTE) && 'new' === ROUTE[0]) {
      return (new bankController)->save();
    }
    if ('GET' == $_SERVER['REQUEST_METHOD'] && 1 == count(ROUTE) && 'convert' === ROUTE[0]) {
      return (new bankController)->convert();
    }
  }

  public static function view($name, $data = []) {
    extract($data);
    require DIR."view/$name.php";
  }

  public static function redirect($url) {
    header('Location: '.URL.$url);
    die;
  }

}