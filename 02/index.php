<?php

$pirmas = 'bla bla';
// $pirmas = "bla bla"; NETEISINGA!

$antras = "ku $pirmas kū";

$trecias = "\n\n\n\n\n\n\n\n labas \n\n\n\n\n\n\n galas";

echo $pirmas;

echo '<br>';

echo $antras;

echo '<br>';

echo $trecias;
echo '<br>'; echo '<br>';echo '<br>';echo '<br>';


$pirmas = 'vidurinis';
$vidurinis = 'antras';
$antras = 'bla bla';

echo $$$pirmas;

echo '<pre>';
print_r([2, 2, 2, 2, 2, 2, 9, 2]);
echo '<br>';
var_dump([2, 2, 2, '2', 2, 2, 9, 2]);

$egzaminoRezultatas = rand(1, 10);
// Išvesti rezultatą ir sprendimą ar egzaminas išlaikytas. Mažiausias išlaikymo balas yra 4


if ($egzaminoRezultatas >= 4) echo 'Egzaminas islaikytas' ." (pazymys: $egzaminoRezultatas)";
else echo 'Egzaminas NEislaikytas' ." (pazymys: $egzaminoRezultatas)";

echo '<pre>';

$dalyvis1 = rand(1, 4);
$dalyvis2 = rand(1, 4);
// Išvesti dalyvių pasirinktus skaičius ir pranešimą "Laimėjo", jeigu dalyvių skaičių suma didesnė nei 6 arba tie skaičiai yra vienodi. Pranešimą "Pralaimėjo" - priešingu atveju 

if ($dalyvis1 + $dalyvis2 > 6 || $dalyvis1 === $dalyvis2) echo 'Laimejo! ' . "Pirmas dalyvis surinko: $dalyvis1 taskus, antras dalyvis surinko: $dalyvis2 taskus.";
else echo 'Pralaimejo! ' . "Pirmas dalyvis surinko: $dalyvis1 taskus, antras dalyvis surinko: $dalyvis2 taskus.";

echo'<pre>';

$petras = rand(10, 20);
$jonas = rand(5, 25);

if ($petras > $jonas) echo "Laimejo <b>Petras</b>, $petras:$jonas";
elseif ($jonas > $petras) echo "Laimejo <b>Jonas</b>, $petras:$jonas ";
else echo "<b>Lygiosios</b>, $petras:$jonas";

echo'<br><br><br>';

$vienas = 3;

$rezYes = 0;
$rezNo = 0;

($vienas === 1) ? $rezYes++ : $rezNo++;
echo'<br>';
echo "$rezYes : $rezNo";

$rezultatas = ($vienas === 1) ? 'Yes' : ($vienas === 2 ? 'Hello' : 'No');

echo'<pre>';
echo $rezultatas;

if ($vienas === 1) $rezultatas = 'Yes';
elseif ($vienas === 2) $rezultatas = 'Hello';
else $rezultatas = 'No';

echo'<br>';
echo $rezultatas;

switch ($vienas) {
  case 1:
    $rezultatas = 'Yes';
    break;
  case 2:
    $rezultatas = 'Hello';
    break;
  default:
    $rezultatas = 'No';
}

echo'<br>';
echo $rezultatas;

$dydis = 'S';
$kurGalimaDeti = '';

switch ($dydis) {
  case 'S':
    $kurGalimaDeti .= 'S ';
  case 'M':
    $kurGalimaDeti .= 'M ';
  case 'L':
    $kurGalimaDeti .= 'L ';
  default:
    $kurGalimaDeti .= 'XL ';
}

echo'<pre>';
echo $kurGalimaDeti;