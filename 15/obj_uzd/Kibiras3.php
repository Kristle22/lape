<?php

// 4. (EXTENDS) Sukurkite klasę kaip pirmame uždavinyje ir pavadinkite Kibiras3. Sukurkite dar vieną klasę KibirasNePo1, kuri extendina klasę Kibiras3. KibirasNePo1 turi naudoti visus tėvinius metodus, bet metodas Prideti1Akmeni() turi pridėti ne vieną o atsitiktinį akmenų kiekį nuo 2 iki 5. Sukurkite KibirasNePo1 objektą ir pademonstruokite veikimą.

class Kibiras3 {
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

class KibirasNePo1 extends Kibiras3 {

  public function prideti1Akmeni() {
    return $this->akmenuKiekis += rand(2, 5);
  }
}

$kibir = new Kibiras3;
$kibirVibir = new KibirasNePo1;

echo '<pre>';
_dc($kibirVibir);

_d($kibir->prideti1Akmeni(), 'Prides tik 1 akmeni:');
_d($kibir->kiekPririnktaAkmenu(), 'Kibire tik 1 akmuo:');

_d($kibirVibir->prideti1Akmeni(), 'Kiek akmenu prides vietoj 1?');
_d($kibirVibir->pridetiDaugAkmenu(10), 'Pridedam dar 10 akmeneliu:');
_d($kibirVibir->kiekPririnktaAkmenu(), 'Kiek akmenu kibire?');