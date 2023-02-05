<?php
require __DIR__.'/TV.php';
require __DIR__.'/vendor/autoload.php';

$tv1 = new TV(42);
$tv2 = new TV(42);
$tv3 = new TV(55);

TV::$programs = [1 => 'LRT', 2 => 'LNK', 3 => 'TV Polonia'];

$tv1->sellTo('Petras');
// $tv1->inches = 105;
$tv1->chanel = 5057;
$tv1->switchChanel(2);

$tv3->sellTo('Valentina');
// $tv3->programs = [1 => 'LRT', 2 => 'LNK', 3 => 'TV Polonia'];
$tv3->switchChanel(2);

_d($tv1, 'TV1');
_d($tv2, 'TV2');
_d($tv3, 'TV3');
_d($tv3('kodas'), 'UUID_loader');
