<?php

echo '<pre>';


// $masyvas['kojines'] = 7;
$masyvas[true] = 88;
$masyvas[1] = 44;
$masyvas[555] = 99;
$masyvas['belekas'] = 99;
// $masyvas[1] = 555;
$masyvas[] = 'tatata';
array_push($masyvas, 'blabla');

$masyvas1 = [77 => 4, 'uu' => 5, 'labas'];
$colors = ['red', 'i' => 'green', 'blue', 'yellow'];
$colors2 = [];

foreach ($colors as $key => &$value) {}

unset($value);

foreach ($colors as $key => $value) {
   echo 'Reikšmė: ' . $value . '<br>';
   // echo 'Stalcius: ' . $key . '<br>';
   // $colors2 [$key] = $value;
   // // echo $value = 'black<pre>';
   // $colors[$key] = 'black';  
   // unset($colors[$key]); 
}

print_r($colors);

$A = 8;
$B = $A; // pagal reiksme (by value)
$B = &$A; // pagal nuoroda (by reference)
$C = &$B;

$A = 10;
$B = 22;
$C = 'labas';

echo "<pre>A = $A, B = $B, C = $C";

// for ($i = 1; $i <= 5; $i++) {
//    echo "<pre>Skaicius yra $i.";
// }

// foreach(range(
//    '8', '12') as &$i) {
//    echo "<pre>Skaicius yra $i.";
// }

echo '<br>';
// echo $i = 78 .'<br>';
// print_r(range('!', '+'));

asort($colors);
// usort($colors, fn($a, $b) => $b <=> $a);

print_r($colors);