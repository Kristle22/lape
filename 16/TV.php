<?php

class TV {

  public $owner; // ==> $this->owner
  public $chanel;
  private $inches; //planuojam 42, 45 ar pan.

  public function __construct($in) {
    $this->inches = $in;
  }

  public function sellTo($name) {
    $this->owner = $name;
  }

  public function switchChanel($number) {
    $this->chanel = $number;
  }

}