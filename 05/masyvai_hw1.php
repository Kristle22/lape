<?php

// 1. Sugeneruokite masyvą iš 30 elementų (indeksai nuo 0 iki 29), kurių reikšmės yra atsitiktiniai skaičiai nuo 5 iki 25.

// 1 VARIANTAS
// echo '<pre>';
// $numbArr = new SplFixedArray(30);
// foreach($numbArr as $key => $numb) {
//   echo "<br>[$key] => ";
//   echo $numbArr[$key] = rand(5, 25);
// }

// echo '</pre>';
// print_r($numbArr);

// 2 VARIANTAS
echo '<pre>';
$numbArr2 = array_fill(0, 30, null);

foreach($numbArr2 as $key => $numb) {
  echo "<br>[$key] => ";
  echo $numbArr2[$key] = rand(5, 25);
}
echo '</pre>Array_fill masyvas:<br>';
print_r($numbArr2);

// 3 VARIANTAS
$myArray = [];

foreach(range(0, 29) as $number) {
  $myArray[] = rand(5, 25);
}

echo '<br> Paprastas masyvas:<br>';
  print_r($myArray);

// 2. Naudodamiesi 1 uždavinio masyvu:
// a) Suskaičiuokite kiek masyve yra reikšmių didesnių už 10;

$more10 = 0;

foreach($myArray as $number) {
  if ($number > 10) $more10++;
}

echo "<pre>2. a) Masyve yra $more10 reiksmiu, didesniu uz 10.";

// b) Raskite didžiausią masyvo reikšmę ir jos indeksą arba indeksus jeigu yra keli;

$maxIndArr = [];
$maxNumb = PHP_INT_MIN;

foreach($myArray as $key => $number) {
  if ($number > $maxNumb) {
    $maxIndArr = []; //senu reiksmiu isvalymas!
    $maxNumb = $number;
  }
  if ($number == $maxNumb) {
    $maxIndArr[] = $key;
  }
}
$maxInd = implode(', ', $maxIndArr);

echo "<pre>2. b) Didziausia masyvo reiksme yra <b>$maxNumb</b>, kurios indeksai: $maxInd<br>";
print_r($maxIndArr);

$maxNumber = max($myArray);
$maxKeysArr = array_keys($myArray, $maxNumber);
$maxNumKeys = implode(', ', $maxKeysArr);

echo "<br>2. b) Didziausios reiksmes <b>$maxNumber</b> indeksai: [$maxNumKeys]<br>";
print_r($maxKeysArr);

// c) Suskaičiuokite visų porinių (lyginių) indeksų reikšmių sumą;

$evenSum = 0;

foreach ($numbArr2 as $number) {
 if ($number % 2 == 0) $evenSum += $number;
}

echo "<pre>2. c) Visu poriniu indeksu reiksmiu suma yra: $evenSum";

// d) Sukurkite naują masyvą, kurio reikšmės yra 1 uždavinio masyvo reikšmes minus tos reikšmės indeksas;

$newArr = [];

foreach($myArray as $key => $number) {
  $newArr[] = $number - $key;
}

echo '<br>';
print_r($newArr);

// e) Papildykite masyvą papildomais 10 elementų su reikšmėmis nuo 5 iki 25, kad bendras masyvas padidėtų iki indekso 39;

foreach(range(1, 10) as $_) {
  $myArray[] = rand(5, 25);
}

print_r($myArray);

// f) Iš masyvo elementų sukurkite du naujus masyvus. Vienas turi būti sudarytas iš neporinių indekso reikšmių, o kitas iš porinių;

$evenArr = [];
$oddArr = [];

foreach($myArray as $key => $number) {
  if ($key % 2 == 0) {
    $evenArr[] = $number;
  } else $oddArr[] = $number;
}  

print_r($evenArr);
print_r($oddArr);

// g) Pirminio masyvo elementus su poriniais indeksais padarykite lygius 0 jeigu jie didesni už 15;

foreach ($myArray as $key => $number) {
  if ($key % 2 == 0 && $number > 15) {
    $myArray[$key] = 0;
  }
}

print_r($myArray);

// h) Suraskite pirmą (mažiausią) indeksą, kurio elemento reikšmė didesnė už 10;

$minInd = 0;
foreach($myArray as $key => $number) {
  if ($number > 10) {
   $minInd = $key;
   break;
  }
}

echo 'Pirmas maziausias indeksas yra: ' .$minInd .'<br>';

// i) Naudodami funkciją unset() iš masyvo ištrinkite visus elementus turinčius porinį indeksą;

foreach ($myArray as $key => $number) {
  if ($key % 2 == 0) {
    unset($myArray[$key]);
  }
}

print_r($myArray);