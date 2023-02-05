<?php

// 1. Sukurti klasę Kibiras1. Sukurti protected savybę akmenuKiekis. Parašyti šiai savybei metodus prideti1Akmeni() pridetiDaugAkmenu($kiekis) ir metodą kiekPririnktaAkmenu(). Sukurti kibiro objektą ir pademonstruoti akmenų rinkimą į kibirą ir rezultatų išvedimą.';

class Kibiras1 {
  protected $akmenuKiekis = 0;
  
  // Metodas uzdraudziantis kurti daugiau nei 1 klases objekta
  private static $kibiras;

public static function getKibiras() {
  return self::$kibiras ?? self::$kibiras = new self;
}
  private function __construct(){}
  private function __clone(){}
  // private function __sleep(){}
  // private function __wakeup(){}

  // Megic metodas, kuris pavercia objektus i funkcijas
  // public function __invoke($x)
  //   {
  //       return "Pats tu $x";
  //   }

  public function prideti1Akmeni() {
    $this->akmenuKiekis++;
  }
  public function __invoke($kiekis)
    {
      $this->akmenuKiekis += $kiekis;
    }


  public function pridetiDaugAkmenu($kiekis) {
    $this->akmenuKiekis += $kiekis;
  }

  public function kiekPririnktaAkmenu() {
    return $this->akmenuKiekis;
  }

  public function __get($prop) {
    _d($prop, 'Magic!===>');
    return $this->$prop;
  }
  
}








