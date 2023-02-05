<?php

// 2. Sukurti klasę Piniginė. Sukurti dvi privačias savybes popieriniaiPinigai ir metaliniaiPinigai. Parašyti metodą ideti($kiekis), kuris prideda pinigus į piniginę. Jeigu kiekis nedidesnis už 2, tai prideda prie metaliniaiPinigai, jeigu kitaip- prie popieriniaiPinigai. Parašykite metodą skaiciuoti(), kuris suskaičiuotų ir atspausdintų popieriniaiPinigai ir metaliniaiPinigai sumą. Sukurti klasės objektą ir pademonstruoti veikimą. Nesvarbu kokios popierinės kupiūros ir metalinės monetos egzistuoja realiame pasaulyje.
//  8. Patobulinti 2 uždavinio piniginę taip, kad būtų galima skaičiuoti kiek piniginėje yra monetų ir kiek banknotų. Parašyti metodą monetos(), kuris skaičiuotų kiek yra piniginėje monetų ir metoda banknotai() - popierinių pinigų skaičiavimui.



class Pinigine {
  private $popieriniaiPinigai = 0;
  private $metaliniaiPinigai = 0;

  public function ideti($kiekis) {
    if ($kiekis <= 2) {
      $this->metaliniaiPinigai += $kiekis;
    } else {
      $this->popieriniaiPinigai += $kiekis;
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


