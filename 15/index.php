<?php

use Meska\Lokys\Vaikas;
// Petro failas

// spl_autoload_register(function ($class) {
  // require __DIR__.'/'.$class.'.php';
// });

require __DIR__.'/vendor/autoload.php';

require __DIR__.'/Bebras.php';
require __DIR__.'/Cart.php';
// require __DIR__.'/Senelis.php';
// require __DIR__.'/Tevas.php';
// require __DIR__.'/Vaikas.php';

// $bebras1 = new Bebras('Jonas', ['Jack', 'Joe', 'Jully']);
// $bebras2 = new Bebras('Janina', ['Jill', 'Jimmy', 'Jacob']);
// $bebras3 = $bebras1;
// $bebras4 = clone($bebras1);

// $bebras1->tailLong = 89;
// // $bebras1->setColor('Orange');
// $bebras1->color = 'Silver';

// echo '<pre>';
// _dc($bebras3);
// _dc($bebras2->who());

// _d($bebras1->tailLong, 'Uodega cm--->');
// _d($bebras1->age, 'Privati savybe:--->');
// _d($bebras1->color, 'Bebro spalva:--->');
// _d($bebras1->who(), 'Kas tu?--->');

// var_dump($bebras1);
// var_dump($bebras2);
// // var_dump($bebras3);
// // var_dump($bebras4);

// $bebras2->age = 250;
// var_dump($bebras2);
// echo $bebras2->age;
// echo '<br>';
// print_r($bebras2->children);
// echo '<br>';
// echo $bebras2->name;
// // echo $bebras2->changeAge([28]);
// $bebras2->whatIsYourAge();

$krepselis1 = Cart::create();
$krepselis2 = Cart::create();
$krepselis3 = clone($krepselis2);
$krepselis4 = unserialize(serialize($krepselis1));

echo Cart::BAD;
echo '<br><br>';
var_dump($krepselis1);
var_dump($krepselis2);
var_dump($krepselis3);
echo 'SERIALIZATION!<br>';
var_dump($krepselis4);

echo '<br>';
echo json_encode($krepselis1);
echo '<br>';
var_dump(json_decode(json_encode($krepselis1)));

$vaikas1 = new Vaikas;
$vaikas2 = new Vaikas;
$vaikas3 = new Vaikas;

$vaikas1->betvarke();
// $vaikas->tvarka();
// $vaikas->pasaka();
// echo Vaikas::$posakis;