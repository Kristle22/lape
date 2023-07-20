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
    if (null === self::$zaidejas1 || null === self:: $zaidejas2) {
      echo '<h3>Zaisti NEGALIMA, nes nesusirinko zaidejai!</h3>';
    } 
    else {
      echo '<h3>Zaidimas PRASIDEDA!</h3>';
      // $zaidejai = [self::$zaidejas1, self::$zaidejas2];
      // return $zaidejai[rand(0,1)]->kamuoliukas = true;
      self::$zaidejas1->kamuoliukas = (bool) rand(0, 1);
      self::$zaidejas2->kamuoliukas = !self::$zaidejas1->kamuoliukas;
    }
  }

  public function arTuriKamuoliuka() {
  return $this->kamuoliukas;
 
  }
  
  public function perduotiKamuoliuka() {
    if (!$this->arTuriKamuoliuka()) {
      _d('Zaidejas '.$this->vardas .' kamuoliuko neturi...');
    } else {
      if (self::$zaidejas1->arTuriKamuoliuka()) {
      _d('Pirmas zaidejas perduoda kamuoliuka antram!!!');
      $this->kamuoliukas = false;
      self::$zaidejas2->kamuoliukas = true;
      }
      elseif (self::$zaidejas2->arTuriKamuoliuka()) {
      _d('Antras zaidejas perduoda kamuoliuka pirmam!!!');
      $this->kamuoliukas = false;
      self::$zaidejas1->kamuoliukas = true;
      } 
    }
  }
}