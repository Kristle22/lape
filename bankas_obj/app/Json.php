<?php

namespace Bank;

use App\DB\DataBase;

class Json implements DataBase {

  private static $obj;
  private $data;

  public static function get() {
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

  public function create(array $bankData) : void {
    $this->data[] = $bankData;
  }

  public function update(int
 $bankId, array $bankData) : void {

 }

  public function delete(int
 $bankId) : void {

 }

  public function show(int
 $bankId) : array {

 }
    
  public function showAll() : array {
      return $this->data;
    }
}