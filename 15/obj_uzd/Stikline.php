<?php

// 6. Sukurti klasę Stikline. Sukurti privačią savybę turis ir kiekis. Parašyti metodą ipilti($kiekis), kuris keistų savybę kiekis. Jeigu stiklinės tūris yra mažesnis nei pilamas kiekis- kiekis netelpa ir būna lygus tūriui. Parašyti metodą ispilti(), kuris grąžiną kiekį. Pilant išpilamas visas kiekis, tas kas netelpa, nuteka per stalo viršų. Sukurti tris stiklinės objektus su tūriais: 200, 150, 100. Didžiausią pripilti pilną ir tada ją ispilti į mažesnę stiklinę, o mažesnę į dar mažesnę.

class Stikline {
  private $turis = 0;
  private $kiekis = 0;

  public function __construct($turis) {
    $this->turis = $turis;
  }

  public function ipilti($kiekis) {
    _d($kiekis - $this->turis, 'Pilant i '.$this->turis.' ml stikline is '.$kiekis.' ml nuteka ml:');
    if ($this->turis < $kiekis) {
      $kiekis = $this->turis;
    }
    return $this->kiekis += $kiekis;
  }

  public function ispilti() {
    return $this->kiekis;
  }

  public function __get($prop) {
    _d($prop, 'Magic!===>');
    return $this->$prop;
  }

  public function __set($prop, $val) {
    return $this->$prop=$val;
  }

}