<?php
// Petro failas

require __DIR__.'/Bebras.php';

$bebras1 = new Bebras('Jonas', ['Jack', 'Joe', 'Jully']);
$bebras2 = new Bebras('Janina', ['Jill', 'Jimmy', 'Jacob']);
$bebras3 = $bebras1;
$bebras4 = clone($bebras1);

$bebras1->tailLong = 89;
// $bebras1->setColor('Orange');
$bebras1->color = 'Silver';

echo '<pre>';
_dc($bebras3);
_dc($bebras2->who());

_d($bebras1->tailLong, 'Uodega cm--->');
_d($bebras1->age, 'Privati savybe:--->');
_d($bebras1->color, 'Bebro spalva:--->');
_d($bebras1->who(), 'Kas tu?--->');

var_dump($bebras1);
var_dump($bebras2);
// var_dump($bebras3);
// var_dump($bebras4);

echo $bebras2->age;
// echo $bebras2->changeAge([28]);
$bebras2->whatIsYourAge();

