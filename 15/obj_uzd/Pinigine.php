<?php

// 2. Sukurti klasę Piniginė. Sukurti dvi privačias savybes popieriniaiPinigai ir metaliniaiPinigai. Parašyti metodą ideti($kiekis), kuris prideda pinigus į piniginę. Jeigu kiekis nedidesnis už 2, tai prideda prie metaliniaiPinigai, jeigu kitaip- prie popieriniaiPinigai. Parašykite metodą skaiciuoti(), kuris suskaičiuotų ir atspausdintų popieriniaiPinigai ir metaliniaiPinigai sumą. Sukurti klasės objektą ir pademonstruoti veikimą. Nesvarbu kokios popierinės kupiūros ir metalinės monetos egzistuoja realiame pasaulyje.
//  8. Patobulinti 2 uždavinio piniginę taip, kad būtų galima skaičiuoti kiek piniginėje yra monetų ir kiek banknotų. Parašyti metodą monetos(), kuris skaičiuotų kiek yra piniginėje monetų ir metoda banknotai() - popierinių pinigų skaičiavimui.



class Pinigine {
  private $popieriniaiPinigai = 0;
  private $metaliniaiPinigai = 0;

  public function ideti($kiekis) {
    if ($kiekis <= 2) {
      return $this->metaliniaiPinigai += $kiekis;
    } else {
      return $this->popieriniaiPinigai += $kiekis;
    }
  }

  public function skaiciuoti() {
    $sum = $this->popieriniaiPinigai + $this->metaliniaiPinigai;
    _dc('Viso pinigineje yra '.$sum.' pinigu.');
    return $sum;
  }

  public function monetos() {
    $sumMonetos = $this->metaliniaiPinigai;
    _dc('Monetu yra '.$sumMonetos);
    return $sumMonetos;
  }

  public function banknotai() {
    $sumBanknotai = $this->popieriniaiPinigai;
    _dc('Banknotu yra '.$sumBanknotai);
    return $sumBanknotai;
  }

  public function __get($prop) {
    _d($prop, 'Magic!===>');
    return $this->$prop;
  }
}

$kashiliokas = new Pinigine;

echo '<pre>';
_dc($kashiliokas);

_d($kashiliokas->popieriniaiPinigai, 'Kiek piniginej popieriniu pinigu?');
_d($kashiliokas->metaliniaiPinigai, 'Kiek piniginej metaliniu pinigu?');

_d($kashiliokas->ideti(200), 'Ideta 200 popieriniu pinigu:');
_d($kashiliokas->popieriniaiPinigai, 'Kiek piniginej popieriniu pinigu?');
_d($kashiliokas->metaliniaiPinigai, 'Kiek piniginej metaliniu pinigu?');

_d($kashiliokas->ideti(2), 'Ideta 2 metaliniu pinigu:');

_d($kashiliokas->skaiciuoti(), 'Kiek viso piniginej yra pinigu?');
_d($kashiliokas->banknotai(), 'Banknotu yra:');
_d($kashiliokas->monetos(), 'Monetu yra:');


