<?php
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Headers: Authorization, Content-Type, X-Requested-With");
  die;
}

require './JsonDb.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, PUT');
header("Access-Control-Allow-Headers: Authorization, Content-Type, X-Requested-With");
header('Content-Type: application/json; charset=utf-8'); 


if ($_GET['url'] == 'home') {

  if ('misko-feja' == apache_request_headers()['Authorization']) {

    echo json_encode([
    'Ciuzinys',
    'Sketis',
    'Dviratis',
    'Kamuolys',
    'Smelio zaislai'
    ]);
    die();
  } else {
    echo json_encode([]);
    // header('HTTP/1.0 403 Forbidden');
  }
}
if ($_GET['url'] == 'login') {
  $rawData = file_get_contents("php://input");
  $data = json_decode($rawData, 1);
  $db = new JsonDb('users');
  $users = $db->showAll();

  foreach($users as $user) {
    if($user['name'] !== $data['name'] || $user['psw'] !== md5($data['pass'])) {
      continue;
    }
    $token = md5(time().rand(0, 10000));
    $user['session'] = $token;
    $db->update($user['id'], $data);

    echo json_encode(['token' => $token]);
    die;
  }
  echo json_encode(['msg' => 'Error']);
  // http_response_code(405);
}