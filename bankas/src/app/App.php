<?php
namespace Bankas;

use Bankas\Messages;

class App {

   const DOMAIN = 'bankas.bit';
   const APP = __DIR__.'/../';
   private static $html;
  
  public static function start() {
   session_start();

   header('Access-Control-Allow-Origin: *');
   header('Access-Control-Allow-Methods: GET, POST, DELETE, PUT, OPTIONS');
   header("Access-Control-Allow-Headers: Authorization, Content-Type, X-Requested-With");
    
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
  header('Content-Type: application/json; charset=utf-8'); 
 
  echo json_encode($data);
 }

 public static function redirect($url = '') {
   header('Location: http://'.self::DOMAIN.'/'.$url);
 }

 public static function url($url = '') {
   return 'http://'.self::DOMAIN.'/'.$url;
 }

 public static function authAdd(object $user) {
  $_SESSION['auth'] = 1;
  $_SESSION['user'] = $user;
 }

 public static function authRem() {
  unset($_SESSION['auth'], $_SESSION['user']);
 }

 public static function auth() :bool {
  return isset($_SESSION['auth']) && $_SESSION['auth'] == 1;
 }

 public static function authName() :string {
  return $_SESSION['user']->full_name;
 }

 public static function csrf() {
  return md5('dfghjhgfdtgyhujhgf'.$_SERVER['HTTP_USER_AGENT']);
 }

 private static function route(array $uri) {

   $m = $_SERVER['REQUEST_METHOD'];

   // LOGIN
   if ('GET' == $m && count($uri) == 1 && $uri[0] === 'login') {
    if (self::auth()) {
      return self::redirect();
    }
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
      if(!self::auth()) {
        return self::redirect('login');
      }
      return (new Controllers\HomeController)->form();
    }
    if ('POST' == $m && count($uri) == 1 && $uri[0] === 'forma') {
      return (new Controllers\HomeController)->doForm();
    }

    // REACT API
    if ('GET' == $m && count($uri) == 2 && $uri[0] === 'api' && $uri [1] == 'home') {
      return (new Controllers\HomeController)->indexJson();
    }
    if (count($uri) == 2 && $uri[0] === 'api' && $uri [1] == 'form') {
      if ('POST' == $m) {
        return (new Controllers\HomeController)->formJson();
      } 
      else {
        // print_r(debug_backtrace());
        // http_response_code(405);
        self::json(['err' => 'OK']);
      }
    }
    else {
      http_response_code(404);
      self::json(['err' => 'OK']);
    }
 }

}