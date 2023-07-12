<?php
// Marytes failas
class Bebras {

  public $tailLong = 45;
  private $color = 'Brown';
  private $age = 42;
  private $name, $children;

  public function __construct(string $n, array $c) {
    echo '<h2>I am MAGIC construct!</h2>';
    $this->whatIsYourAge();
    $this->age = rand(10, 200);
    $this->whatIsYourAge();
    $this->name = $n;
    $this->children = $c;
  }

  public function __destruct() {
    echo '<h3>MAGIC! Visi mire..</h3>';
  }

  public function who() {
    return 'As esu Bebras';
  }

  public function whatIsYourAge() { //getter
    echo '<br>'.(++$this->age).'</br>';
  }

  public function changeAge(array $age) { //setter
    if($age[0] > 45) return;
    $this->age = $age[0];
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