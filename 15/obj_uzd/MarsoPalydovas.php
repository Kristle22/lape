<?php

// 9. (STATIC) Sukurkite klasę MarsoPalydovas.  Kontroliuokite objekto kūrimą iš klasės naudodami statinį metodą. Padarykite taip, kad iš viso būtų galima sukurti tik du objektus iš šitos klasės. Pirmam sukuriamam objektui įrašykite privačią savybę title lygią stringui “Deimas”, o antram tokią pat savybę tik lygią stringui “Fobas”. Bandant sukurti trečią objektą, turėtų būti grąžinamas vienas iš anksčiau sukurtų objektų parinktas atsitiktine tvarka.

class MarsoPalydovas {

  private static $palydovas1;
  private static $palydovas2;
  private $title;

  public static function getPalydovas() {
    return self::$palydovas1 == null ? self::$palydovas1 = new self : ( self::$palydovas2 == null ? self::$palydovas2 = new self : [self::$palydovas1, self::$palydovas2][rand(0, 1)]);
  }

  private function __construct(){
    $this->title = self::$palydovas1 == null ? 'Deimas' : 'Fobas';
  }


}