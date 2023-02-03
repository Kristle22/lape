<?php
// Marytes failas
class Bebras {

  public $tailLong = 45;
  private $color = 'Brown';
  private $age = 42;

  public function who() {
    return 'As esu Bebras';
  }

  public function __get($prop) {
    _d($prop, 'Magic!===>');

    if (in_array($prop, ['age'])) {
      return 'Fy..ne tavo reikalas..';
    }

    return $this->$prop; 
  }

  public function __set($prop, $val) {
    if ('black' == strtolower($val) && 'color' == $prop) {
      return;
    }
    return $this->$prop = $val;
  }


  // public function setColor($color) {
  //   if ('black' == $color) {
  //     return;
  //   }
  //   return $this->color = $color;
  // }

  // public function getColor() {
  //   return $this->color;
  // }

}