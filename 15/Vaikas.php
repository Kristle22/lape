<?php

class Vaikas extends Tevas {

  public static $posakis = 'Bla blabla..';

  public function __construct() {
    parent::__construct();
    echo '<h3>TikTokas vietoj Pasakos..</h3>';
  }

  public function betvarke() {
    echo '<h3>Visiskas betvarke!</h3>';
    // echo '<h3>'.self::$posakis.'</h3>';
    // echo '<h3>'.static::$posakis.'</h3>';
  }

  // public function pasaka() {
  //   echo '<h3>Skrolinu TikToka..</h3>';
  // }
}