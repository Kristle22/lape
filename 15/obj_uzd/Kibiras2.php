<?php

// 3. (STATIC) Sukurkite klasę kaip pirmame uždavinyje ir pavadinkite Kibiras2. Patobulinkite pridėdami statinę privačią savybę akmenuKiekisVisuoseKibiruose. Ši savybė turi rodyti kiek akmenų surinkta visuose Kibiras2 objektuose. Sukurkite geterį objekte, ir statinį geterį klasėje, kuris išvestų akmenuKiekisVisuoseKibiruose reikšmę. Sukurkite tris kibirus ir pademonstruokite veikimą.

class Kibiras2 {
  protected $akmenuKiekis = 0;
  static private $akmenuKiekisVisuoseKibiruose = 0;

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
