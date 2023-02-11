<?php
namespace Start;

use Ramsey\Uuid\Uuid;

use Kosmosas\Antena;

class TV extends Antena {
  public static $programs = [1 => 'LRT', 2 => 'TV7', 3 => 'TV Polonia'];
  
  public $etikete2 = 'Televizorius';
  public $owner; // ==> $this->owner
  public $chanel;
  private $inches; //planuojam 42, 45 ar pan.
  private $nowWatching;

  public function ijungti($bilekas) {
    _d('TV Ijungtas!', 'Kas ijungtas?');
  }

  public function __construct($in, $dk = 0) {
    $this->inches = $in;
  }
// This function generates UUID code
  public function __invoke($x)
    {
      $uuid = Uuid::uuid4();

printf(
    "UUID: %s\nVersion: %d\n",
    $uuid->toString(),
    $uuid->getFields()->getVersion()
);
        return "Pats tu $x";
    }

  public function sellTo($name) {
    $this->owner = $name;
  }

  public function switchChanel($number) {
    $this->chanel = $number;
    $this->nowWatching = TV::$programs[$number];
  }

  public function kaTu() {}

}