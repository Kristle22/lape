<?php

// 1. Sukurti klasę Kibiras1. Sukurti protected savybę akmenuKiekis. Parašyti šiai savybei metodus prideti1Akmeni() pridetiDaugAkmenu($kiekis) ir metodą kiekPririnktaAkmenu(). Sukurti kibiro objektą ir pademonstruoti akmenų rinkimą į kibirą ir rezultatų išvedimą.';

class Kibiras1 {
  protected $akmenuKiekis = 0;
  
  public function prideti1Akmeni() {
    return $this->akmenuKiekis += 1;
  }

  public function pridetiDaugAkmenu($kiekis) {
    return $this->akmenuKiekis += $kiekis;
  }

  public function kiekPririnktaAkmenu() {
    return $this->akmenuKiekis;
  }

  public function __get($prop) {
    _d($prop, 'Magic!===>');
    return $this->$prop;
  }
}

$kibirelis = new Kibiras1;

echo '<pre>';
_dc($kibirelis);

_d($kibirelis->akmenuKiekis, 'Kiek yra viso akmenu?');
_d($kibirelis->prideti1Akmeni(), 'Pridedam 1 akmeni:');
_d($kibirelis->pridetiDaugAkmenu(9), 'Pridedam 8 akmenis:');
_d($kibirelis->pridetiDaugAkmenu(4), 'Pridedam 4 akmenis:');
_d($kibirelis->prideti1Akmeni(8), 'Pridedam dar 1 ameni:');
_d($kibirelis->akmenuKiekis, 'Kiek dabar yra akmenu?--->');










