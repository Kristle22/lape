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

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");


// echo 'labas';
// die;
// ROUTER
if ('GET' == $m && 1 == count($uri) && 'animals' == $uri[0]) {
  $out = $db->showAll();
}
if ('POST' == $m && 1 == count($uri) && 'animals' == $uri[0]) {
  $rawData = file_get_contents("php://input");
    $data = json_decode($rawData, 1);
    $db->create($data);
    $out = ['msg' => 'OK, donkey!'];
  }

$out = json_encode($out);
echo $out;