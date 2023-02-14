<?php

namespace Bank\Rates;

use App\DB\DataBase;

class Json {

  private static $obj;
  private $data;

  public static function get() {
    return self::$obj ?? self::$obj = new self; 
  }

  private function __construct() {
    if (!file_exists(DIR.'data/rates.json')) {
      file_put_contents(DIR.'data/rates.json', json_encode([]));
    }
    $this->data = json_decode(file_get_contents(DIR.'data/rates.json'), 1);
  }

  public function __destruct() {
    file_put_contents(DIR.'data/rates.json', json_encode($this->data));
  }


  public function addCache(array $rez) : void {
    $this->data[] = $rez;
  }

  public function clearCache() : void {
    if (!file_exists(DIR.'data/rates.json')) {
      file_put_contents(DIR.'data/rates.json', json_encode([]));
    }
    $this->data = json_decode(file_get_contents(DIR.'data/rates.json'), 1);
    
    foreach ($this->data as $k => $r) {
      if ($r[6] + VALID_CATCHE < time()) {
        unset($this->data[$k]);
      }
    }
  }
  
  public function showAll() : array {
    return $this->data;
  }
}