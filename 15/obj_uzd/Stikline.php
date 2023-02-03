<?php

// 6. Sukurti klasę Stikline. Sukurti privačią savybę turis ir kiekis. Parašyti metodą ipilti($kiekis), kuris keistų savybę kiekis. Jeigu stiklinės tūris yra mažesnis nei pilamas kiekis- kiekis netelpa ir būna lygus tūriui. Parašyti metodą ispilti(), kuris grąžiną kiekį. Pilant išpilamas visas kiekis, tas kas netelpa, nuteka per stalo viršų. Sukurti tris stiklinės objektus su tūriais: 200, 150, 100. Didžiausią pripilti pilną ir tada ją ispilti į mažesnę stiklinę, o mažesnę į dar mažesnę.

class Stikline {
  private $turis = 0;
  private $kiekis = 0;

  public function ipilti($kiekis) {
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

$stikline100 = new Stikline;
$stikline100->turis = 100;

$stikline150 = new Stikline;
$stikline150->turis = 150;

$stikline200 = new Stikline;
$stikline200->turis = 200;

echo '<pre>';
_dc($stikline200);
_dc($stikline150);
_dc($stikline100);

_d($stikline200->ipilti(200), 'Pripildom 200ml stikline-->');
_d($stikline200->kiekis, '200 ml stiklineje yra ml:');

_d($stikline150->ipilti($stikline200->ispilti()), '200 ml ispilam i 150 ml stikline:');
_d($stikline150->kiekis, '150 ml stiklineje yra ml:');

_d($stikline100->ipilti($stikline150->ispilti()), '150 ml ispilam i 100 ml stikline:');
_d($stikline100->kiekis, '100 ml stiklineje yra ml:');

echo '<h2>Stikliniu turiai po perpilstymu:</h2>';
_dc($stikline200);
_dc($stikline150);
_dc($stikline100);