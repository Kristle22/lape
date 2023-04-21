<?php
//  11. Naudokite funkcija rand(). Sugeneruokite 6 kintamuosius su atsitiktinem reikšmėm nuo 1000 iki 9999. Atspausdinkite reikšmes viename strige, išrūšiuotas nuo didžiausios iki mažiausios, atskirtas tarpais. Naudoti ciklų ir masyvų NEGALIMA.

$kint1 = rand(1000, 9999);
$kint2 = rand(1000, 9999);
$kint3 = rand(1000, 9999);
$kint4 = rand(1000, 9999);
$kint5 = rand(1000, 9999);
$kint6 = rand(1000, 9999);

echo '6 skaitmenu stringas: '. $intStr6 = "$kint1, $kint2, $kint3, $kint4, $kint5, $kint6";

// Min reiksmes suradimas (is 6 sk Str) su intcmp() palyginimo funkcija vietoj min()
function intcmp($a, $b) {
  if((int) $a == (int) $b) return 0;
  if((int) $a > (int) $b) return 1;
  if((int) $a < (int) $b) return -1;
}

if (intcmp($kint1, $kint2) < 0 && intcmp($kint1, $kint3) && intcmp($kint1, $kint4) < 0 && intcmp($kint1, $kint5) < 0 && intcmp($kint1, $kint6) < 0) {
  $first = $kint1;
}
if (intcmp($kint2, $kint1) < 0 && intcmp($kint2, $kint3) && intcmp($kint2, $kint4) < 0 && intcmp($kint2, $kint5) < 0 && intcmp($kint2, $kint6) < 0) {
  $first = $kint2;
}
if (intcmp($kint3, $kint1) < 0 && intcmp($kint3, $kint2) && intcmp($kint3, $kint4) < 0 && intcmp($kint3, $kint5) < 0 && intcmp($kint3, $kint6) < 0) {
  $first = $kint3;
}
if (intcmp($kint4, $kint1) < 0 && intcmp($kint4, $kint2) && intcmp($kint4, $kint3) < 0 && intcmp($kint4, $kint5) < 0 && intcmp($kint4, $kint6) < 0) {
  $first = $kint4;
}
if (intcmp($kint5, $kint1) < 0 && intcmp($kint5, $kint2) && intcmp($kint5, $kint3) < 0 && intcmp($kint5, $kint4) < 0 && intcmp($kint5, $kint6) < 0) {
  $first = $kint5;
}
if (intcmp($kint6, $kint1) < 0 && intcmp($kint6, $kint2) && intcmp($kint6, $kint3) < 0 && intcmp($kint6, $kint4) < 0 && intcmp($kint6, $kint5) < 0) {
  $first = $kint6;
}
echo '<br><br>$first = ' ."$first";

// Min reiksmes suradimas (is 5 sk Str) su min() funkcija
  $intStr5 = str_replace($first.', ', '', $intStr6);
echo "<br><br>5 skaitmenu stringas: $intStr5<br>";

echo $kint1 = substr($intStr5, 0, 4) .'<br>';
echo $kint2 = substr($intStr5, 6, 4) .'<br>';
echo $kint3 = substr($intStr5, 12, 4) .'<br>';
echo $kint4 = substr($intStr5, 18, 4) .'<br>';
echo $kint5 = substr($intStr5, 24, 4) .'<br>';

$second = min((int)$kint1, (int)$kint2, (int)$kint3, (int)$kint4, (int)$kint5);
echo '<br>$second = ' ."$second";

// Min reiksmes suradimas (is 4 sk Str) su min() funkcija
$intStr4 = str_replace($second.', ', '', $intStr5);
echo "<br><br>4 skaitmenu stringas: $intStr4<br>";

echo $kint1 = substr($intStr4, 0, 4) .'<br>';
echo $kint2 = substr($intStr4, 6, 4) .'<br>';
echo $kint3 = substr($intStr4, 12, 4) .'<br>';
echo $kint4 = substr($intStr4, 18, 4) .'<br>';

$third = min((int)$kint1, (int)$kint2, (int)$kint3, (int)$kint4);
echo '<br>$third = ' ."$third";

// Min reiksmes suradimas (is 3 sk Str) su min() funkcija
$intStr3 = str_replace($third.', ', '', $intStr4);
echo "<br>3 skaitmenu stringas: $intStr3<br>";

echo $kint1 = substr($intStr3, 0, 4) .'<br>';
echo $kint2 = substr($intStr3, 6, 4) .'<br>';
echo $kint3 = substr($intStr3, 12, 4) .'<br>';

$fourth = min((int)$kint1, (int)$kint2, (int)$kint3);
echo '<br>$fourth = ' ."$fourth";

// Min reiksmes suradimas (is 2 sk Str) su min() funkcija
$intStr2 = str_replace($fourth.', ', '', $intStr3);
echo "<br>2 skaitmenu stringas: $intStr2<br>";

echo $kint1 = substr($intStr2, 0, 4) .'<br>';
echo $kint2 = substr($intStr2, 6, 4) .'<br>';

$fifth = min((int)$kint1, (int)$kint2);
echo '<br>$fifth = ' ."$fifth";

$sixth = max((int)$kint1, (int)$kint2);
echo '<br>$sixth = ' ."$sixth";

$sortedIntStr = "$first $second $third $fourth $fifth $sixth";

echo '<br>Surusiuotas skaiciu stringas: ' . "$sortedIntStr";