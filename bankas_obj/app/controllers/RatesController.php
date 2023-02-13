<?php
namespace Bank\Controllers;

use Bank\App;

class RatesController {

public function convert() {
    return App::view('convert');
  }
}