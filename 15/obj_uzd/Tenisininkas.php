<?php

// 10. (STATIC) Sukurti klasę Tenisininkas. Klasė Tenisininkas turi privačią savybę vardas, privačią savybę kamuoliukas  (true jei turi ir false jei ne) privačią static savybę zaidejas1, privačią static savybę zaidejas2 (žaidėjų objektams saugoti)  Klasė turi tokius metodus: 
// A. Public arTuriKamuoliuka();
// B. Public perduotiKamuoliuka() Perduoda kamuoliuką kitam Tenisininkas objektui;
// C. Public static zaidimoPradzia() Perduoda kamuoliuką atsitiktiniam žaidėjo objektui;

// Sukurti du Tenisininkas objektus. Kamuoliuko neturi nei vienas. Iškviesti statinį metodą zaidimoPradzia() ir kažkuriam žaidėjui priskirti kamuoliuką. Žaidėjo objekto metodu perduotiKamuoliuka() perduoti kamuoliuką kitam žaidėjui. Žaidėjas, kuris neturi kamuoliuko, perduoti kitam negali.


class Tenisininkas {

  private $vardas;
  private $kamuoliukas;
  private static $zaidejas1;
  private static $zaidejas2;

  public function __construct($vardas) {
    self::$zaidejas1 = self::$zaidejas1 ?? $this;
    self::$zaidejas2 = $this;
    $this->vardas = $vardas;
    $this->kamuoliukas = false;
  }

  public static function zaidimoPradzia() {
    $zaidejai = [self::$zaidejas1, self::$zaidejas2];
    return $zaidejai[rand(0,1)]->kamuoliukas = true;
    
  }

  public function arTuriKamuoliuka() {
  return $this->kamuoliukas ? true : false;
 
  }
  
  public function perduotiKamuoliuka() {

    if ($this->kamuoliukas && $this == self::$zaidejas1) {
      _d('Pirmas zaidejas perduoda kamuoliuka antram!!!');
      $this->kamuoliukas = false;
      self::$zaidejas2->kamuoliukas = true;
    } 
    elseif (!$this->kamuoliukas && $this == self::$zaidejas1) {
     _d('Pirmas zaidejas kamuoliuko neturi...');
    }
    elseif ($this->kamuoliukas && $this == self::$zaidejas2) {
      _d('Antras zaidejas perduoda kamuoliuka pirmam!!!');
      $this->kamuoliukas = false;
      self::$zaidejas1->kamuoliukas = true;
    } elseif (!$this->kamuoliukas && $this == self::$zaidejas2) {
      _d('Antras zaidejas kamuoliuko neturi...');
    }
  }
}