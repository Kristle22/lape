<?php
use Ramsey\Uuid\Uuid;

class TV {
  public static $programs = [1 => 'LRT', 2 => 'TV7', 3 => 'TV Polonia'];

  public $owner; // ==> $this->owner
  public $chanel;
  private $inches; //planuojam 42, 45 ar pan.
  private $nowWatching;

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

}