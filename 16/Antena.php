<?php

abstract class Antena extends Bliudas implements Televizija, Radijus {

  use Gabalas;

  public $antena = 'Gera lauko antena';

  public $etikete = 'Lauko antena';

  public function ijungti(string $f) {
    _d('Antena Ijungtas!', 'Kas ijungtas?');
  }

  public function radio(){}

  public function antenosKanalai($number) {
    $this->switchChanel($number);
  }

  abstract protected function switchChanel($number);
  
}