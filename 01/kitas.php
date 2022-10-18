<?php


echo '<h1>Viso gero</h1>';




$labas = 2;

echo $labas++ + ++$labas;
// 2 + 4

// echo ++$labas;
echo '<br>';
// echo $labas++;

// $pirmas = 'bla bla';
// $antras = "ku kū";
// $trecias = $pirmas . ' ' . $antras;
// $trecias2 = "$pirmas $antras";

// echo $trecias;
// echo '<br>';
// echo $trecias2;

$pirmas = 'bla bla';
$antras = 'ku kū';
echo $pirmas, ', ', $antras;
echo '<pre></pre>';
print $pirmas;
echo '<br>';

// Programuotojams
print_r($pirmas);
echo '<br>';
var_dump($pirmas, $antras);