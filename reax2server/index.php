<?php
require './JsonDb.php';

// settings
define('INSTALL', '/lape/reax2server/');
define('DIR', __DIR__.'/app/');
define('URL', 'http://localhost/lape/reax2server/');
// //////////////////////////////////////

$uri = str_replace(INSTALL, '', $_SERVER['REQUEST_URI']);
$uri = explode('/', $uri);

$m = $_SERVER['REQUEST_METHOD'];
$db = new JsonDb('farm');

// ROUTER
  if ('GET' == $m && 1 == count($uri) && 'animals' == $uri[0]) {
    $out = $db->showAll();

  }
  $out = json_encode($out);
  header('Content-Type: application/json');
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: GET, POST');
  header("Access-Control-Allow-Headers: X-Requested-With");
  echo $out;

// if(count($uri) == 2) {
//   if($uri[0] == 'kambarys') {
//     if($uri[1] == 1) {
//       require __DIR__.'/app/k1.php';
//     }
//     elseif($uri[1] == 2) {
//       require __DIR__.'/app/k2.php';
//     }
//     else {
//       require __DIR__.'/app/404.php';
//     }
//   }
//   elseif($uri[0] == 'add-funds') {
//     $userId = (int) $uri[1];
//     require __DIR__.'/app/addMoney.php';
//   }
//   else {
//     require __DIR__.'/app/404.php';
//   }
// }
// else {
//   require __DIR__.'/app/404.php';
// }