<?php

namespace Old\Super;

class Senelis {

  public static $posakis = 'Va Va, Sakiau Tau';

  public function __construct() {
    echo '<h3>Seku seku pasaka apie Meskena..</h3>';
  }

  public function pasaka() {
    echo '<h3>Seku seku pasaka apie Meskena..</h3>';
    echo '<h3>'.self::$posakis.'</h3>';
    echo '<h3>'.static::$posakis.'</h3>';
  }

  // public static function getSelfName() {
  //   return self::$name;
  // }

  // public static function getStaticName() {
  //   return static::$name;
  // }
}