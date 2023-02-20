<?php

namespace Bank\Login;

use App\DB\DataBase;

class Json {

  private static $obj;
  private $data;

  public static function getJson() {
    return self::$obj ?? self::$obj = new self; 
  }

  private function __construct() {
    if (!file_exists(DIR.'data/users.json')) {
      file_put_contents(DIR.'data/users.json', json_encode([]));
    }
    $this->data = json_decode(file_get_contents(DIR.'data/users.json'), 1);
  }

  public function __destruct() {
    file_put_contents(DIR.'data/users.json', json_encode($this->data));
  }

  public function show(int $userId) : array {
    foreach($this->data as $user) {
      if ($user['id'] == $userId) {
        return $user;
      }
    }
    return [];
 }

 public function getUser(string $email, string $pass) : array {
  foreach($this->data as $user) {
    if ($user['email'] == $email && $user['pass'] == $pass) {
      return $user;
    }
  }
  return [];
}
}