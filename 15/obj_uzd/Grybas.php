<?php

// 7. Sukurti klasę Grybas. Sukurti klasę Krepsys. Krepsys turi konstantą DYDIS lygią 500. Grybas turi tris privačias savybes: valgomas, sukirmijes, svoris. Kuriant Grybo objektą jo savybės turi būti atsitiktinai priskiriamos taip: valgomas- true arba false, sukirmijes- true arba false ir svoris- nuo 5 iki 45. Eiti grybauti, t.y. Kurti naujus Grybas objektus, jeigu nesukirmijęs ir valgomas dėti į Krepsi objektą, kol bus pririnktas pilnas krepšys nesukirmijusių ir valgomų grybų (gali būti biški daugiau nei DYDIS).

class Grybas {
  private $valgomas;
  private $sukirmijes;
  private $svoris;

  public function __construct($valg, $sukr, $svr) {
    $this->valgomas = $valg;
    $this->sukirmijes = $sukr;
    $this->svoris = $svr;
  }

  public function __get($prop) {
    _d($prop, 'Magic!===>');
    return $this->$prop;
  }
}

function eitiGrybauti() {
  $baravykas = new Grybas(rand(0, 1), rand(0, 1), rand(5, 45));

  $valgomas = $baravykas->valgomas;
  $sukirmijes = $baravykas->sukirmijes;
  $svoris = $baravykas->svoris;

  if ($valgomas == 1 && $sukirmijes == 0) {
    _dc($baravykas);
    return $baravykas;
  } else {
    _dc('Netinkamas');
  }
}


class Krepsys {
  public $dydis = 500;
  
  public function detiIKrepsi() {
    $bendrasSvoris = 0;
    $grybuSkaicius = 0;
    do {
      $grybas = eitiGrybauti(); 
      if (is_object($grybas)) {
        $grybuSkaicius++;
        $gryboSvoris = $grybas->svoris;
        $bendrasSvoris += $gryboSvoris;
        _dc('Grybo svoris: '.$gryboSvoris);
        _dc('Bendras svoris: '.$bendrasSvoris);
        _dc('Viso pririnkta grybu: '.$grybuSkaicius);
      }
    } while ($bendrasSvoris < $this->dydis);
  }
}

$kashikas = new Krepsys;

_dc($kashikas->detiIKrepsi());