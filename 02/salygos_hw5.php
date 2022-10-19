<?php

// 5. Sukurkite keturis kintamuosius ir ​rand()​ funkcija sugeneruokite jiems reikšmes nuo 0 iki 2. Suskaičiuokite kiek yra nulių, vienetų ir dvejetų. (sprendimui masyvo nenaudoti).

echo '<br>skaicius1 = ' .$sk1 = rand(0, 2);
echo '<br>skaicius2 = ' .$sk2 = rand(0, 2);
echo '<br>skaicius3 = ' .$sk3 = rand(0, 2);
echo '<br>skaicius4 = ' .$sk4 = rand(0, 2);

$nuliai = 0;
$vienetai = 0;
$dvejetai = 0;

// PIRMAS VARIANTAS (if...else conditions)

if ($sk1 === 0) {
  $nuliai++;
} elseif ($sk1 === 1) {
  $vienetai++;
} else {
  $dvejetai++;
}
if ($sk2 === 0) {
  $nuliai++;
} elseif ($sk2 === 1) {
  $vienetai++;
} else {
  $dvejetai++;
}
if ($sk3 === 0) {
  $nuliai++;
} elseif ($sk3 === 1) {
  $vienetai++;
} else {
  $dvejetai++;
}
if ($sk4 === 0) {
  $nuliai++;
} elseif ($sk4 === 1) {
  $vienetai++;
} else {
  $dvejetai++;
}

// ANTRAS VARIANTAS (ternary operator)

($sk1 === 0) ? $nuliai++ : ($sk1 === 1 ? $vienetai++ : $dvejetai++);
($sk2 === 0) ? $nuliai++ : ($sk2 === 1 ? $vienetai++ : $dvejetai++);
($sk3 === 0) ? $nuliai++ : ($sk3 === 1 ? $vienetai++ : $dvejetai++);
($sk4 === 0) ? $nuliai++ : ($sk4 === 1 ? $vienetai++ : $dvejetai++);

// TRECIAS VARIANTAS (string function)

$visiSkaiciai = $sk1.$sk2.$sk3.$sk4;

$nuliai = substr_count($visiSkaiciai, '0');
$vienetai = substr_count($visiSkaiciai, '1');
$dvejetai = substr_count($visiSkaiciai, '2');

echo '<pre>Visi skaiciai: ' .$visiSkaiciai;
echo "<pre>nuliu: $nuliai, <br>vienetu: $vienetai, <br>dvejetu: $dvejetai.";

// KETVIRTAS VARIANTAS (if & arithmetic)

$suma = $sk1 + $sk2 + $sk3 + $sk4;

$_2 = 0;

if ($sk1 === 2) {
  $_2++;
}
if ($sk2 === 2) {
  $_2++;
}
if ($sk3 === 2) {
  $_2++;
}
if ($sk4 === 2) {
  $_2++;
}

$_1 = $suma - ($_2 * 2);

$_0 = 4 - $_1 - $_2;

echo "<pre>nuliu: $_0, <br>vienetu: $_1, <br>dvejetu: $_2.";