<?php

namespace Bank;

use App\DB\DataBase;

class Json implements DataBase {

  private static $obj;
  private $data;

  public static function getJson() {
    return self::$obj ?? self::$obj = new self; 
  }

  private function __construct() {
    if (!file_exists(DIR.'data/accInfo.json')) {
      file_put_contents(DIR.'data/accInfo.json', json_encode([]));
    }
    $this->data = json_decode(file_get_contents(DIR.'data/accInfo.json'), 1);
  }

  public function __destruct() {
    file_put_contents(DIR.'data/accInfo.json', json_encode($this->data));
  }

  public function create(array $accData) : void {
    $this->data[] = $accData;
  }

  public function update(int $accId, array $accData) : void {
  foreach($this->data as $key => $acc) {
    if ($acc['id'] == $accId) {
      $this->data[$key] = $accData;
    }
  }
 }

  public function delete(int $accId) : void {
  foreach($this->data as $key => $acc) {
    if ($acc['id'] == $accId) {
      unset($this->data[$key]);
    }
  }
 }

  public function show(int $accId) : array {
    foreach($this->data as $acc) {
      if ($acc['id'] == $accId) {
        return $acc;
      }
    }
    return [];
 }
    
  public function showAll() : array {
      return $this->data;
    }
}