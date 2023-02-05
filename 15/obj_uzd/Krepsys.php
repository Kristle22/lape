<?php

// 7. Sukurti klasę Grybas. Sukurti klasę Krepsys. Krepsys turi konstantą DYDIS lygią 500. Grybas turi tris privačias savybes: valgomas, sukirmijes, svoris. Kuriant Grybo objektą jo savybės turi būti atsitiktinai priskiriamos taip: valgomas- true arba false, sukirmijes- true arba false ir svoris- nuo 5 iki 45. Eiti grybauti, t.y. Kurti naujus Grybas objektus, jeigu nesukirmijęs ir valgomas dėti į Krepsi objektą, kol bus pririnktas pilnas krepšys nesukirmijusių ir valgomų grybų (gali būti biški daugiau nei DYDIS).

class Krepsys {
  const DYDIS = 500;
  public $visiGrybai = [];
  public $grybuSkaicius = 0;
  public $bendrasSvoris = 0;
  
  public function arDetiIKrepsi($grybas) : bool {
    if ($grybas->valgomas == 0 || $grybas->sukirmijes == 1) {
      _dc('Netinkamas');
    } else {
      $this->visiGrybai[] = $grybas;
      $this->grybuSkaicius = count($this->visiGrybai);
      $this->bendrasSvoris += $grybas->svoris;
      print_r($this->visiGrybai);
      _dc('Bendras svoris: '.$this->bendrasSvoris);
    }
    return self::DYDIS > $this->bendrasSvoris;
  }
}