<?php
namespace Bankas;

class App {
  
  public static function start() {

   $uri = explode('/', $_SERVER['REQUEST_URI']);
   array_shift($uri);
   self::route($uri);

    print_r($uri);
    // print_r($_SERVER['REQUEST_URI']);
 }

 public static function view($name, $data = []) {
   require __DIR__."/../views/$name.php";
   extract($data);
   echo "Hello, $data[0]<br>";
 }

 private static function route(array $uri) {
    if (count($uri) == 1 && $uri[0] === '') {
      return (new Controllers\HomeController)->index();
    }

    else {
      echo 'kitka<br>';
    }
 }

}