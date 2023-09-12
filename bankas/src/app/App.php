<?php
namespace Bankas;

use Bankas\Messages;

class App {

   const DOMAIN = 'bankas.lt';
   const APP = __DIR__.'/../';
   private static $html;
  
  public static function start() {
   session_start();
   Messages::init();
   ob_start();

   $uri = explode('/', $_SERVER['REQUEST_URI']);
   array_shift($uri);
   self::route($uri);
   self::$html = ob_get_contents();
   ob_end_clean();
 }

 public static function sent() {
  echo self::$html;
 }

 public static function view($name, $data = []) {
    extract($data);
    require __DIR__."/../views/$name.php";
 }

 public static function json($data = []) {
    header('Content-Type: app;icatio/json; charset=utf-8'); 
    echo json_encode($data);
 }

 public static function redirect($url = '') {
   header('Location: http://'.self::DOMAIN.'/'.$url);
 }

 public function authAdd(object $user) {
  $_SESSION['auth'] = 1;
  $_SESSION['user'] = $user;
 }

 public function authrem() {
  unset($_SESSION['auth'], $_SESSION['user']);
 }

 private static function route(array $uri) {

   $m = $_SERVER['REQUEST_METHOD'];

   // LOGIN
   if ('GET' == $m && count($uri) == 1 && $uri[0] === 'login') {
    return (new Controllers\LoginController)->showLogin();
  }
   if ('POST' == $m && count($uri) == 1 && $uri[0] === 'login') {
    return (new Controllers\LoginController)->doLogin();
  }
   if ('POST' == $m && count($uri) == 1 && $uri[0] === 'logout') {
    return (new Controllers\LoginController)->logout();
  }
  // END LOGIN
    if (count($uri) == 1 && $uri[0] === '') {
      return (new Controllers\HomeController)->index();
    }
    if ('GET' == $m && count($uri) == 1 && $uri[0] === 'json') {
      return (new Controllers\HomeController)->indexJson();
    }
    if ('GET' == $m && count($uri) == 2 && $uri[0] === 'get-it') {
      return (new Controllers\HomeController)->getIt($uri[1]);
    }
    if ('GET' == $m && count($uri) == 1 && $uri[0] === 'forma') {
      return (new Controllers\HomeController)->form();
    }
    if ('POST' == $m && count($uri) == 1 && $uri[0] === 'forma') {
      return (new Controllers\HomeController)->doForm();
    }

    else {
      echo 'kitka<br>';
    }
 }

}