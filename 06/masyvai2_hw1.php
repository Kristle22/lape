<?php
// 1. Sugeneruokite masyvą iš 10 elementų, kurio elementai būtų masyvai iš 5 elementų su reikšmėmis nuo 5 iki 25.

$masyvas = [];

foreach(range(1, 10) as $elementas) {
  foreach(range(1, 5) as $skaicius) {
    $masyvas[$elementas][$skaicius] = rand(5, 25);
  }
}
echo '<pre>';
print_r($masyvas);

// 2. Naudodamiesi 1 uždavinio masyvu:
// a) Suskaičiuokite kiek masyve yra elementų didesnių už 10;

$more10 = 0;

foreach($masyvas as $elementas) {
  foreach($elementas as $skaicius) {
    if ($skaicius > 10) $more10++;
  }
}

echo '<br>';
echo '<b style="font-size: 25px; color: crimson">' .$more10 .'</b>';

// b) Raskite didžiausio elemento reikšmę;

$maxSkaicius = PHP_INT_MIN;

foreach($masyvas as $elementas) {
  foreach($elementas as $skaicius) {
    if ($skaicius > $maxSkaicius) $maxSkaicius = $skaicius;
  }
}

echo '<br>';
echo '<b style="font-size: 25px; color: crimson">' .$maxSkaicius .'</b>';

// c) Suskaičiuokite kiekvieno antro lygio masyvų su vienodais indeksais sumas (t.y. suma reikšmių turinčių indeksą 0, 1 ir t.t.)

$ind1sum = 0;
$ind2sum = 0;
$ind3sum = 0;
$ind4sum = 0;
$ind5sum = 0;

foreach($masyvas as $elementas) {
  foreach($elementas as $key => $skaicius) {
    if ($key == 1) {
      $ind1sum += $skaicius;
    } else if ($key == 2) {
      $ind2sum += $skaicius;
    } else if ($key == 3) {
      $ind3sum += $skaicius;
    } else if ($key == 4) {
      $ind4sum += $skaicius;
    } else {
      $ind5sum +=$skaicius;
    }
  }
}

echo '<br>';
echo '<b style="font-size: 25px; color: crimson">' .$ind1sum .', ' .$ind2sum .', ' .$ind3sum .', ' .$ind4sum .', ' . $ind5sum .'</b>';

// d) Visus masyvus “pailginkite” iki 7 elementų

foreach($masyvas as $key => $elementas) {
  do {
    $masyvas[$key][] = rand(5, 25);
    $len = count($masyvas[$key]);
  } while($len < 7);
}

echo '<br>';
print_r($masyvas);

// e) Suskaičiuokite kiekvieno iš antro lygio masyvų elementų sumą atskirai ir sumas panaudokite kaip reikšmes sukuriant naują masyvą. T.y. pirma naujo masyvo reikšmė turi būti lygi mažesnio masyvo, turinčio indeksą 0 dideliame masyve, visų elementų sumai 

$newArr = [];

foreach($masyvas as $key => $elementas) {

   $newArr[] = array_sum($elementas);
}

echo '<br>NEW ARRAY:';
print_r($newArr);

// 3. Sukurkite masyvą iš 10 elementų. Kiekvienas masyvo elementas turi būti masyvas su atsitiktiniu kiekiu nuo 2 iki 20 elementų. Elementų reikšmės atsitiktinai parinktos raidės iš intervalo A-Z. Išrūšiuokite antro lygio masyvus pagal abėcėlę (t.y. tuos kur su raidėm).

$raidziuMasyvas = [];
$raides = range('A', 'Z') ;

foreach(range(1, 10) as $elementas) {
  foreach(range(1, rand(2, 20)) as $elm) {
    $raidziuMasyvas[$elementas][$elm] = $raides[rand(0, 25)];
  }
  sort($raidziuMasyvas[$elementas]);
}

echo '<br>Raidziu masyvas:';
print_r($raidziuMasyvas);

// 4. Išrūšiuokite trečio uždavinio pirmo lygio masyvą taip, kad elementai kurių masyvai trumpiausi eitų pradžioje. 
// Masyvai kurie turi bent vieną “K” raidę, visada būtų didžiojo masyvo visai pradžioje.

usort($raidziuMasyvas, function($a, $b) { return count($a) <=> count($b); });

echo '<br>Masyvas pagal ilgi:';
print_r($raidziuMasyvas);