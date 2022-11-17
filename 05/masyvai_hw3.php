<?php
// 3. Sugeneruokite masyvą, kurio reikšmės atsitiktinės raidės A, B, C ir D, o ilgis 200. Suskaičiuokite kiek yra kiekvienos raidės.

$raides = ['A', 'B', 'C', 'D'];
$atsRaidziuMasyvas = [];
$A = 0;
$B = 0;
$C = 0;
$D = 0;

foreach(range(1, 200) as $key => $val) {
$atsRaidziuMasyvas[] = $raides[rand(0, 3)];
if ($atsRaidziuMasyvas[$key] == 'A') $A++;
if ($atsRaidziuMasyvas[$key] == 'B') $B++;
if ($atsRaidziuMasyvas[$key] == 'C') $C++;
if ($atsRaidziuMasyvas[$key] == 'D') $D++;
}

print_r($atsRaidziuMasyvas);
echo "<pre>Raidziu <b>A</b> yra $A, raidziu <b>B</b>: $B, raidziu <b>C</b>: $C, o raidziu <b>D</b>: $D";

echo '<br>';
print_r(array_count_values($atsRaidziuMasyvas));

// 4. Išrūšiuokite 3 uždavinio masyvą pagal abecėlę.
sort($atsRaidziuMasyvas);
echo '<br>';
print_r($atsRaidziuMasyvas);

// 5. Sugeneruokite 3 masyvus pagal 3 uždavinio sąlygą. Sudėkite masyvus, sudėdami atitinkamas reikšmes. Paskaičiuokite kiek unikalių (po vieną, nesikartojančių) reikšmių ir kiek unikalių kombinacijų gavote.

$pirmasMasyvas = [];
$antrasMasyvas = [];
$treciasMasyvas = [];
$raidziuKombMasyvas = [];
$uniqValues = 0;

foreach(range(1, 200) as $key => $value) {
  $pirmasMasyvas[] = $raides[rand(0, 3)];
  $antrasMasyvas[] = $raides[rand(0, 3)];
  $treciasMasyvas[] = $raides[rand(0, 3)];
  $raidziuKombMasyvas[] = $pirmasMasyvas[$key] .$antrasMasyvas[$key] .$treciasMasyvas[$key];
}

$uniqCombinations = array_count_values($raidziuKombMasyvas);

foreach($uniqCombinations as $comb) {
  if ($comb == 1) $uniqValues++;
}

print_r($raidziuKombMasyvas);
print_r($uniqCombinations);
echo '<br>Masyve yra ' .count($uniqCombinations) .' unikalios kombinacijos ir ' .$uniqValues . ' unikalios reiksmes.';

// 6. Sugeneruokite du masyvus, kurių reikšmės yra atsitiktiniai skaičiai nuo 100 iki 999. Masyvų ilgiai 100. Masyvų reikšmės turi būti unikalios savo masyve (t.y. neturi kartotis).

$masyvas1 = [];
$masyvas2 = [];

  do {
  $masyvas1[] = rand(100, 999);
  $masyvas1 = array_unique($masyvas1);
  } while (count($masyvas1) < 100);

  do {
  $masyvas2[] = rand(100, 999);
  $masyvas2 = array_unique($masyvas2);
  } while (count($masyvas2) < 100);

echo '<br>';
print_r($masyvas1);
print_r($masyvas2);

// 7. Sugeneruokite masyvą, kuris būtų sudarytas iš reikšmių, kurios yra pirmame 6 uždavinio masyve, bet nėra antrame 6 uždavinio masyve.

echo 'ARRAY_DIFF:';
$uniqMasyvas = array_diff($masyvas1, $masyvas2);

print_r($uniqMasyvas);

$uniqArray = [];
foreach($masyvas1 as $num) {
  if (array_search($num, $masyvas2, true) === false) $uniqArray[] = $num;
}

print_r($uniqArray);

// 8. Sugeneruokite masyvą iš elementų, kurie kartojasi abiejuose 6 uždavinio masyvuose.

echo 'ARRAY_INTERSECT:';
$pasikartReiksmes = array_intersect($masyvas1, $masyvas2);

print_r($pasikartReiksmes);

$repeatValues = [];
foreach($masyvas1 as $num) {
  if (array_search($num, $masyvas2, true) !== false) $repeatValues[] = $num;
}

print_r($repeatValues);

// 9. Sugeneruokite masyvą, kurio indeksus sudarytų pirmo 6 uždavinio masyvo reikšmės, o jo reikšmės iš būtų antrojo masyvo.

$combinedArray = array_combine($masyvas1, $masyvas2);

print_r($combinedArray);

// 10. Sugeneruokite 10 skaičių masyvą pagal taisyklę: Du pirmi skaičiai- atsitiktiniai nuo 5 iki 25. Trečias, pirmo ir antro suma. Ketvirtas- antro ir trečio suma. Penktas trečio ir ketvirto suma ir t.t.

$skaiciuMasyvas = [];

foreach(range(1, 10) as $key => $num) {
  if ($key <= 1) {
    $skaiciuMasyvas[] = rand(5, 25);
  } else {
    $skaiciuMasyvas[] = $skaiciuMasyvas[$key-2] + $skaiciuMasyvas[$key-1];
  }
}

print_r($skaiciuMasyvas);

// 11. Sugeneruokite 101 elemento masyvą su atsitiktiniais skaičiais nuo 0 iki 300. Reikšmes kurios tame masyve yra ne unikalios pergeneruokite iš naujo taip, kad visos reikšmės masyve būtų unikalios. Išrūšiuokite masyvą taip, kad jo didžiausia reikšmė būtų masyvo viduryje, o einant nuo jos link masyvo pradžios ir pabaigos reikšmės mažėtų. Paskaičiuokite pirmos ir antros masyvo dalies sumas (neskaičiuojant vidurinės). Jeigu sumų skirtumas (modulis, absoliutus dydis) yra didesnis nei | 30 | rūšiavimą kartokite. (Kad sumos nesiskirtų viena nuo kitos daugiau nei per 30)

$atsSkaiciuMasyvas = [];

do {
  $atsSkaiciuMasyvas[] = rand(0, 300);
  $atsSkaiciuMasyvas = array_unique($atsSkaiciuMasyvas);
} while(count($atsSkaiciuMasyvas) < 101);

$maxSkaicius = max($atsSkaiciuMasyvas);
$indexOfMaxSkaicius = array_search($maxSkaicius, $atsSkaiciuMasyvas);
unset($atsSkaiciuMasyvas[$indexOfMaxSkaicius]);

$pirmaDalis = 0;
$antraDalis = 0;

do {
  foreach($atsSkaiciuMasyvas as $key => $val) {
    if($key < 50) {
      $pirmaDalis += $val;
    } else {
      $antraDalis += $val;
    }
    if (abs($pirmaDalis - $antraDalis) > 30) shuffle($atsSkaiciuMasyvas);
  }
} while (abs($pirmaDalis - $antraDalis) > 30);

$padalintasMasyvas = array_chunk($atsSkaiciuMasyvas, 50);

sort($padalintasMasyvas[0]);
rsort($padalintasMasyvas[1]);

array_push($padalintasMasyvas[0], $maxSkaicius);
$concatArray = array_merge($padalintasMasyvas[0], $padalintasMasyvas[1]);

print_r($atsSkaiciuMasyvas);
echo "[$indexOfMaxSkaicius] => $maxSkaicius" ;
echo '<br>Pirma dalis: ' .$pirmaDalis;
echo '<br>Antra dalis: ' .$antraDalis;
echo '<br>Absoliutus dydis: ' .abs($pirmaDalis - $antraDalis);
echo '<br>';
print_r($concatArray);