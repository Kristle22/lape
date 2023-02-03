<?php
// Petro failas

require __DIR__.'/Bebras.php';

$bebras1 = new Bebras;
$bebras2 = new Bebras;
$bebras3 = $bebras1;

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