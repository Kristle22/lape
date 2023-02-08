<?php

spl_autoload_register(function ($name) {
  _d("Mes norim klases: $name");
});

// spl_autoload_register(function ($name) {
//   require __DIR__."/$name.php";
// });

require __DIR__.'/Gabalas.php';
require __DIR__.'/Radijus.php';
require __DIR__.'/Televizija.php';
require __DIR__.'/Bliudas.php';
require __DIR__.'/Antena.php';
require __DIR__.'/TV.php';

require __DIR__.'/vendor/autoload.php';


$tv1 = new Start\TV(42, 88);
$tv2 = new Start\TV(42);
$tv3 = new Start\TV(55);

Start\TV::$programs = [1 => 'LRT', 2 => 'LNK', 3 => 'TV Polonia'];

var_dump($tv3 instanceof Radijus);
echo '<br>';

$tv1->sellTo('Petras');
// $tv1->inches = 105;
$tv1->chanel = 5057;
$tv1->switchChanel(2);
$tv1->ijungti(2);
$tv1->gabalas();

$tv3->sellTo('Valentina');
// $tv3->programs = [1 => 'LRT', 2 => 'LNK', 3 => 'TV Polonia'];
$tv3->switchChanel(2);

_d($tv1, 'TV1');
_d($tv2, 'TV2');
_d($tv3, 'TV3');
_d($tv3('kodas'), 'UUID_loader');
